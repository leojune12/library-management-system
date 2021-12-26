`<template>
    <v-autocomplete
        v-model="model"
        :items="items"
        :label="label"
        :loading="isLoading"
        :item-text="isFullName ? 'full_name' : field"
        item-value="id"
        :search-input.sync="search"
        dense
        clearable
        v-on:keydown="updateItems()"
        hint="Type one or more letter"
        :persistent-hint="!model"
    ></v-autocomplete>
</template>

<script>
    export default {
        data() {
            return {
                items: [],
                model: null,
                isLoading: false,
                search: null,
                debounce: null,
                default: null,
            }
        },

        props: {
            label: {
                type: String,
                default: ''
            },
            table: {
                type: String,
                default: ''
            },
            field: {
                type: String,
                default: 'name',
            },
            isFullName: {
                type: Boolean,
                default: false,
            },
            modelProp: {
                type: null,
                default: null,
            },
            defaultValue: {
                type: null,
                default: null,
            }
        },

        watch: {
            // search: {
            //     handler (val) {

            //         if (val && val !== this.model) {

            //             clearTimeout(this.debounce)
            //             this.isLoading = true
            //             this.debounce = setTimeout(() => {
            //                 this.fetchApi()
            //                 this.isLoading = false
            //             }, 600)
            //         }
            //     },
            //     deep: true,
            // },

            model: {
                handler (val) {
                    this.$emit('update:model-prop', val)
                },
                deep: true,
            }
        },

        mounted() {
            if (!!this.defaultValue) {

                this.default = this.defaultValue

                this.fetchApi(true)
            } else {

                this.fetchApi()
            }
        },

        methods: {
            async fetchApi(hasDefault = false) {

                await axios.post('/api/table-items', {
                        table: this.table,
                        search: this.search,
                        field: this.field,
                        isFullName: this.isFullName,
                        defaultValue: this.default,
                    })
                    .then(response => {

                        if (response.data.length) {

                            this.items = response.data

                            if (hasDefault) {

                                this.model = this.items[0]['id']
                                this.default = null
                            }
                        }
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

            updateItems() {

                clearTimeout(this.debounce)
                this.isLoading = true
                this.debounce = setTimeout(() => {
                    this.fetchApi()
                    this.isLoading = false
                }, 600)
            },
        }
    }
</script>

<style>

</style>
