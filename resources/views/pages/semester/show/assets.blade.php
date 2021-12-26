@push('scripts')
    <script type="text/javascript" defer>

        new Vue({
            el: '#app',
            vuetify: vuetify,
            data () {
                return {
                    url: '/semesters',
                }
            },
        })
    </script>
@endpush
