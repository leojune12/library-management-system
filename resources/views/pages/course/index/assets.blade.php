@push('scripts')
    <script type="text/javascript" defer>
        new Vue({
            el: '#app',
            vuetify: vuetify,
            components: {
                AutocompleteComponent,
                DropdownComponent,
            },

            data() {
                return {
                    url: '/courses',
                    items: [],
                    loading: true,
                    options: {},
                    headers: [
                        {
                            text: 'Name',
                            align: 'start',
                            value: 'name',
                        },
                        {
                            text: 'Description',
                            value: 'description',
                        },
                        {
                            text: 'Action',
                            value: 'actions',
                            sortable: false,
                        },
                    ],
                    footerProps: {
                        showFirstLastPage: true,
                        itemsPerPageOptions: [10, 25, 50, 100]
                    },
                    selected: [],
                    pagination: {
                        data: []
                    },
                    filterDialog: false,
                    advanceFilters: {
                        name: null,
                        description: null,
                    },
                }
            },

            watch: {
                options: {
                    handler () {
                        this.fetchTableData()
                    },
                    deep: true,
                },
            },

            computed: {
                getFilters () {

                    const { sortBy, sortDesc, page, itemsPerPage } = this.options

                    let orderBy = 'id'

                    let filters = '?'
                    filters += 'page=' + page
                    filters += '&perPage=' + itemsPerPage
                    filters += '&orderBy=' + orderBy
                    filters += '&orderType=' + (sortDesc[0] ? 'ASC' : 'DESC')

                    return filters
                },

                getAdvanceFilters () {
                    let filters = ''

                    filters += '&name=' + this.advanceFilters.name
                    filters += '&description=' + this.advanceFilters.description

                    return filters
                }
            },

            methods: {

                async fetchTableData() {

                    this.loading = true

                    await axios.get(this.url + this.getFilters + this.getAdvanceFilters)
                        .then(response => {
                            this.pagination = response.data
                            this.options.page = response.data.current_page
                            this.options.itemsPerPage = parseInt(response.data.per_page)
                            this.loading = false
                        })
                        .catch(error => {
                            this.$swal.fire({
                                title: 'Something went wrong',
                                text: "Please refresh the page.",
                                icon: 'error',
                                confirmButtonColor: '#d33',
                            })
                        })
                },

                confirmDelete(id) {

                    this.$swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Delete'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.loading = true
                            this.delete(id)
                        }
                    })
                },

                async delete(id) {

                    let id_array = Array.isArray(id)
                        ? Object.keys(id).map(index => id[index].id)
                        : [id]

                    let url = this.url + '/' + id_array[0]

                    await axios.post(url, {
                        _method: 'delete',
                        id_array: id_array
                    })
                        .then(response => {
                            this.$swal.fire({
                                title: "Success",
                                text: "Deleted successfully.",
                                icon: "success",
                                confirmButtonColor: "#4CAF50",
                                timer: 3000
                            })
                            this.selected = []
                            this.fetchTableData()
                        })
                        .catch(error => {
                            this.$swal.fire({
                                title: 'Something went wrong',
                                text: "Please refresh the page.",
                                icon: 'error',
                                confirmButtonColor: '#d33',
                            })
                        })
                },

                filter() {
                    this.filterDialog = false
                    this.fetchTableData()
                },

                closeFilter() {
                    this.filterDialog = false
                },

                resetFilter() {
                    this.$refs.advanceFilterForm.reset()
                },
            }
        })
    </script>
@endpush
