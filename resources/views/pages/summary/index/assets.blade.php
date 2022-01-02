@push('links')
    <style>
        td {
            background-color: white !important;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript" defer>
        new Vue({
            el: '#app',
            vuetify: vuetify,
            components: {
                AutocompleteComponent,
                DropdownComponent,
                TableDropdownComponent,
            },

            data() {
                return {
                    url: '/summary',
                    items: @json($courses ?? []),
                    total:@json($total ?? []),
                    filterDialog: false,
                    advanceFilters: {
                        academic_year_id: null,
                        semester_id: null,
                    }
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

                    filters += '&academic_year_id=' + this.advanceFilters.academic_year_id
                    filters += '&semester_id=' + this.advanceFilters.semester_id

                    return filters
                }
            },

            methods: {

                async fetchTableData() {

                    // this.loading = true

                    // await axios.get(this.url + this.getFilters + this.getAdvanceFilters)
                    //     .then(response => {
                    //         this.pagination = response.data
                    //         this.options.page = response.data.current_page
                    //         this.options.itemsPerPage = parseInt(response.data.per_page)
                    //         this.loading = false
                    //     })
                    //     .catch(error => {
                    //         this.$swal.fire({
                    //             title: 'Something went wrong',
                    //             text: "Please refresh the page.",
                    //             icon: 'error',
                    //             confirmButtonColor: '#d33',
                    //         })
                    //     })

                    window.location.href = "/summary?" + this.getAdvanceFilters;
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
