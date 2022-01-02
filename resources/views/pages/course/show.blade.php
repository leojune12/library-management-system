@section('title', isset($title) ? ' | ' . $title : '')
<x-app-layout>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title class="text-h6">
                View {{ $title }}
            </v-list-item-title>
        </v-list-item-content>
    </v-list-item>

    <v-row>
        <v-col
            cols="12"
            md="4"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Name</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="4"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Description</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->description ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
        >
            <v-btn
                class="tw-ml-4"
                color="success"
                :href="url + '/{{ $model->id }}/edit'"
            >
                Update
            </v-btn>
            <v-btn
                class="tw-ml-4"
                :href="url"
            >
                Back
            </v-btn>
        </v-col>
    </v-row>
    @include('pages.course.show.assets')
</x-app-layout>
