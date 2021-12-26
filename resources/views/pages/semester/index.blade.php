@section('title', isset($title) ? ' | ' . $title : '')
<x-app-layout>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title class="text-h6">
                {{ $title }}
            </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    <v-data-table
        v-model="selected"
        :headers="headers"
        :loading="loading"
        class="elevation-1"
        :items="pagination.data"
        :options.sync="options"
        :server-items-length="pagination.total"
        :footer-props="footerProps"
        item-key="id"
        show-select
        checkbox-color="success"
    >
        <template v-slot:top>
            <v-toolbar
                flat
            >
                <v-btn
                    tile
                    color="success"
                    small
                    :href="url + '/create'"
                >
                    <v-icon left>
                        mdi-plus
                    </v-icon>
                    Create
                </v-btn>

                <v-spacer></v-spacer>

                <v-btn
                    tile
                    color="error"
                    small
                    class="tw-mr-1"
                    @click="confirmDelete(selected)"
                    :disabled="!selected.length"
                >
                    <v-icon left>
                        mdi-delete
                    </v-icon>
                    Delete <span v-if="selected.length">(@{{ selected.length }})</span>
                </v-btn>

                <v-btn
                    tile
                    color="warning"
                    small
                    @click="filterDialog = true"
                >
                    <v-icon left>
                        mdi-filter
                    </v-icon>
                    Filter
                </v-btn>

                @include('pages.semester.index.filter_dialog')

            </v-toolbar>
        </template>

        <template v-slot:item.actions="{ item }">

            <div class="tw-flex">

                <v-btn
                    icon
                    color="success"
                    :href="url + '/' + item.id"
                    title="View"
                >
                    <v-icon>mdi-eye</v-icon>
                </v-btn>
                <v-menu
                    offset-y
                    left
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            icon
                            v-bind="attrs"
                            v-on="on"
                        >
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list flat>

                        <v-list-item
                            dense
                            ripple
                            :href="url + '/' + item.id + '/edit'"
                            class="hover:tw-bg-gray-200"
                        >
                            <v-list-item-icon>
                                <v-icon
                                    v-text="'mdi-pencil'"
                                ></v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title v-text="'Edit'"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                        <v-list-item
                            dense
                            link
                            ripple
                            class="hover:tw-bg-gray-200"
                            @click="confirmDelete(item.id)"
                        >
                            <v-list-item-icon>
                                <v-icon
                                    v-text="'mdi-delete'"
                                ></v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title
                                    v-text="'Delete'"
                                ></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </div>
        </template>
    </v-data-table>

    @include('pages.semester.index.assets')
</x-app-layout>
