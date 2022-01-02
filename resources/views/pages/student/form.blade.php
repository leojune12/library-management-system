@section('title', isset($title) ? ' | ' . $title : '')
<x-app-layout>
    <v-list-item class="tw-pl-0">
        <v-list-item-content>
            <v-list-item-title class="text-h6">
                {{ $method }} {{ $title }}
            </v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    <v-form>
        <v-row>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.id_number"
                    label="ID No."
                    :error-messages="errors?.id_number?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.first_name"
                    label="First Name"
                    :error-messages="errors?.first_name?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.middle_name"
                    label="Middle Name"
                    :error-messages="errors?.middle_name?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.last_name"
                    label="Last Name"
                    :error-messages="errors?.last_name?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <dropdown-component
                    label="Gender"
                    :model-prop.sync="form.gender_id"
                    array="gender"
                    :error-messages="errors?.gender_id?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.address"
                    label="Home Address"
                    :error-messages="errors?.address?.[0]"
                />
            </v-col>
        </v-row>
        <v-row>
            <v-col
                cols="12"
                md="3"
            >
                <table-dropdown-component
                    label="Academic Year"
                    :model-prop.sync="form.academic_year_id"
                    table="academic_years"
                    :error-messages="errors?.academic_year_id?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <table-dropdown-component
                    label="Semester"
                    :model-prop.sync="form.semester_id"
                    table="semesters"
                    :error-messages="errors?.semester_id?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <table-dropdown-component
                    label="Year Level"
                    :model-prop.sync="form.year_level_id"
                    table="year_levels"
                    :error-messages="errors?.year_level_id?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <autocomplete-component
                    label="Course"
                    table="courses"
                    :default-value="form.course_id"
                    :model-prop.sync="form.course_id"
                    :error-messages="errors?.course_id?.[0]"
                />
            </v-col>
        </v-row>
        @include('pages.student.form.subject-info')
        <v-row>
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
                <v-btn :href="url">
                    Cancel
                </v-btn>
            </v-col>
        </v-row>

    </v-form>

    @include('pages.student.form.assets')
</x-app-layout>
