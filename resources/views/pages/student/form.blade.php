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
                    v-model="form.name"
                    label="Name"
                    :error-messages="errors?.name?.[0]"
                />
            </v-col>
            <v-col
                cols="12"
                md="3"
            >
                <v-text-field
                    v-model="form.description"
                    label="Description"
                    :error-messages="errors?.description?.[0]"
                />
            </v-col>
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
