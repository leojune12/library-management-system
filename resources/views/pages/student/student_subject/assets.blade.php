@push('scripts')
    <script type="text/javascript" defer>

        new Vue({
            el: '#app',
            vuetify: vuetify,
            components: {
                TableMultiWhereDropdownComponent,
            },
            data () {
                return {
                    url: '/students',
                    errors: null,

                    form: {
                        delete_subject_ids: [],
                        ...@json($model ?? []),
                        subjects: @json($model->subjects ?? []),
                    },
                }
            },

            methods: {

                async submit() {

                    await axios.{{ isset($model->id) ? 'put' : 'post' }}(this.url + '/subjects' + '{{ isset($model->id) ? "/" . $model->id : '' }}', this.form)
                        .then((response) => {
                            console.log(response.data)
                            if (response.data.status == 'success') {

                                this.$swal.fire({
                                    title: response.data.title,
                                    text: response.data.message,
                                    icon: response.data.status,
                                    confirmButtonColor: '#4CAF50'
                                }).then(() => {

                                    window.location.href = '/students/' + this.form.id;
                                })
                            } else {

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
                        }
                    )
                },

                addSubject () {
                    this.form.subjects.push({
                        id: (Math.random() + 1).toString(36).substring(2),
                        pivot: {
                            // id: (Math.random() + 1).toString(36).substring(2),
                            student_id: this.form.id,
                            subject_id: ''
                        }
                    })
                },

                removeSubject (index, id) {
                    if (id) {
                        this.form.delete_subject_ids.push(id)
                    }

                    this.form.subjects.splice(index, 1)
                },
            },
        })
    </script>
@endpush
