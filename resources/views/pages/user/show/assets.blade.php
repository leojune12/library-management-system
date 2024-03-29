@push('scripts')
    <script type="text/javascript" defer>

        new Vue({
            el: '#app',
            vuetify: vuetify,
            data () {
                return {
                    url: '/students',
                    subjects: @json($model->subjects ?? [])
                }
            },
        })
    </script>
@endpush
