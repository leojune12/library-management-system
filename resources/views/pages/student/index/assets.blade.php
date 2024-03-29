@push('scripts')
    <script type="text/javascript" defer>
        new Vue({
            el: '#app',
            vuetify: vuetify,
            components: {
                AutocompleteComponent,
                DropdownComponent,
                TableDropdownComponent
            },

            data() {
                return {
                    url: '/students',
                    items: [],
                    loading: true,
                    options: {},
                    headers: [
                        {
                            text: 'ID No.',
                            align: 'start',
                            value: 'id_number',
                        },
                        {
                            text: 'Name',
                            value: 'full_name',
                        },
                        {
                            text: 'Gender',
                            value: 'gender_type',
                        },
                        {
                            text: 'Year Level',
                            value: 'year_level.name',
                        },
                        {
                            text: 'Course',
                            value: 'course.name',
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
                        id_number: null,
                        name: null,
                        gender_id: null,
                        year_level_id: null,
                        course_id: null,
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

                    filters += '&id_number=' + this.advanceFilters.id_number
                    filters += '&name=' + this.advanceFilters.name
                    filters += '&gender_id=' + this.advanceFilters.gender_id
                    filters += '&year_level_id=' + this.advanceFilters.year_level_id
                    filters += '&course_id=' + this.advanceFilters.course_id

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
