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
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>ID Number</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->id_number ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Name</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->full_name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Gender</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->gender_type ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Home Address</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->address ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Academic Year</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->academicYear->name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Semester</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->semester->name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Year Level</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->yearLevel->name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
        <v-col
            cols="12"
            md="3"
        >
            <v-list-item two-line>
                <v-list-item-content>
                    <v-list-item-subtitle>Course</v-list-item-subtitle>
                    <v-list-item-title>
                        {{ $model->course->name ?? "" }}
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
    </v-row>

    <v-divider class="tw-mt-3"></v-divider>

    <v-row>
        <v-col class="tw-pb-0">
            <v-list-item class="">
                <v-list-item-conten>
                    <v-list-item-title class="text-h6">
                        Subjects
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
    </v-row>
    <v-row>
        <v-col>
            <v-simple-table class="tw-border">
                <template v-slot:default>
                    <thead>
                        <tr>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
                            Units
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                        v-for="item in subjects"
                        :key="item.id"
                        >
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.units }}</td>
                        </tr>
                        <tr v-if="!subjects.length">
                            <td colspan="2" class="tw-text-center">
                                No items yet
                            </td>
                        </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-col>
    </v-row>
    <v-row>
        <v-col
            cols="12"
        >
            <v-btn
                class="tw-ml-4"
                color="success"
                :href="url + '/{{ $model->id }}/edit'"
            >
                Update Student
            </v-btn>
            <v-btn
                class="tw-ml-4"
                color="success"
                :href="'/students/subjects/{{ $model->id }}'"
            >
                Update Subjects
            </v-btn>
            <v-btn
                class="tw-ml-4"
                :href="url"
            >
                Back
            </v-btn>
        </v-col>
    </v-row>
    @include('pages.student.show.assets')
</x-app-layout>
