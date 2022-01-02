@section('title', isset($title) ? ' | ' . $title : '')
<x-app-layout>
    <v-list-item class="tw-pl-0">
        <v-list-item-content>
            <v-list-item-title class="text-h6">
                {{ $method }} {{ $title }}
            </v-list-item-title>
        </v-list-item-content>
    </v-list-item>

    @include('pages.student.student_subject.general_info')

    <v-divider class="tw-mt-3"></v-divider>

    <v-row>
        <v-col>
            <v-list-item class="tw-pl-0">
                <v-list-item-content>
                    <v-list-item-title class="subtitle-1 font-weight-medium">
                        Subjects
                        <v-btn
                            color="warning"
                            small
                            class="tw-ml-3"
                            @click="addSubject()"
                        >
                            <v-icon
                                small
                            >
                                mdi-plus
                            </v-icon>
                            Add
                        </v-btn>
                    </v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-col>
    </v-row>

    <v-form>
        <v-row v-for="(item, index) in form.subjects" :key="item.id">
            <v-col
                cols="12"
                md="4"
                class="tw-flex tw-items-center"
            >
                <table-multi-where-dropdown-component
                    :model-prop.sync="item.pivot.subject_id"
                    label="Subject"
                    table="subjects"
                    :where-query="[
                        {
                            column: 'course_id',
                            value: form.course_id
                        },
                        {
                            column: 'year_level_id',
                            value: form.year_level_id
                        },
                    ]"
                ></table-multi-where-dropdown-component>
                <v-btn
                    color="error"
                    plain
                    @click="removeSubject(index, item.pivot.id)"
                >
                    Remove
                </v-btn>
            </v-col>
        </v-row>

        <v-row class="tw-mt-5">
            <v-col
                cols="12"
            >
                <v-btn
                    class="mr-4"
                    @click="submit"
                    color="success"
                >
                    Submit
                </v-btn>
                <v-btn :href="'/students/' + form.id">
                    Cancel
                </v-btn>
            </v-col>
        </v-row>

    </v-form>

    @include('pages.student.student_subject.assets')
</x-app-layout>
