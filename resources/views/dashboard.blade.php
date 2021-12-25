<x-app-layout>
    <x-slot name="header">
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="tw-py-12" id="app">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
        <div class="tw-max-w-7xl tw-mx-auto sm:tw-px-6 lg:tw-px-8">
            <div class="tw-bg-white tw-overflow-hidden tw-shadow-sm sm:tw-rounded-lg">
                <div class="tw-p-6 tw-bg-white tw-border-b tw-border-gray-200">
                    You're logged in!
                    <v-text-field
                        label="Main input"
                        :rules="rules"
                        hide-details="auto"
                    />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

        <script type="text/javascript" defer>
            new Vue({
                el: '#app',
                vuetify: vuetify,
                // components: {
                //     AutocompleteComponent,
                //     DropdownComponent,
                //     TableDropdownComponent,
                // },

                mounted() {

                    console.log('asd')
                }
            })
        </script>

    @endpush
</x-app-layout>
