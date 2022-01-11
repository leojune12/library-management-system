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
            data () {
                return {
                    url: '/user',
                    errors: null,

                    form: {
                        reset_subjects: false,
                        ...@json($model ?? []),
                    },
                }
            },

            watch: {
                'form.year_level_id': function (val) {
                    this.form.reset_subjects = true
                },
                'form.course_id': function (val) {
                    this.form.reset_subjects = true
                },
            },

            methods: {

                submit() {

                    if (this.form.reset_subjects && this.form.id) {

                        this.$swal.fire({
                        title: 'You changed year level and/or course?',
                        text: "This will reset subjects of this student. Proceed?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                        }).then((result) => {

                            if (result.isConfirmed) {

                                this.delete

                                this.proceedSubmit()
                            }
                        })
                    } else {

                        this.proceedSubmit()
                    }
                },

                async proceedSubmit() {

                    await axios.{{ isset($model->id) ? 'put' : 'post' }}(this.url + '{{ isset($model->id) ? "/" . $model->id : '' }}', this.form)
                    .then((response) => {
                        console.log(response.data)
                        if (response.data.status == 'success') {

                            this.$swal.fire({
                                title: response.data.title,
                                text: response.data.message,
                                icon: response.data.status,
                                confirmButtonColor: '#4CAF50'
                            }).then(() => {

                                window.location.href = this.url;
                            })
                        } else {

                            console.log(response.data)

                            this.$swal.fire({
                                title: response.data.title,
                                text: response.data.message,
                                icon: response.data.status,
                                confirmButtonColor: '#d33',
                            })

                            this.form = response.data.old
                            this.errors = response.data.errors
                            document.getElementById('app').scrollIntoView();
                        }
                    })
                }
            },
        })
    </script>
@endpush
