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
                md="4"
            >
                <v-text-field
                    v-model="form.name"
                    label="Name"
                    :error-messages="errors?.name?.[0]"
                />
            </v-col>
        </v-row>
        <v-row>
            <v-col
                cols="12"
                md="4"
            >
                <v-text-field
                    v-model="form.email"
                    label="Email"
                    :error-messages="errors?.email?.[0]"
                    type="email"
                />
            </v-col>
        </v-row>
        <v-row v-if="!form.id">
            <v-col
                cols="12"
                md="4"
            >
                <v-text-field
                    v-model="form.password"
                    label="Password"
                    :error-messages="errors?.password?.[0]"
                    type="password"
                />
            </v-col>
        </v-row>
        <v-row v-if="!form.id">
            <v-col
                cols="12"
                md="4"
            >
                <v-text-field
                    v-model="form.password_confirmation"
                    label="Confirm Password"
                    :error-messages="errors?.password_confirmation?.[0]"
                    type="password"
                />
            </v-col>
        </v-row>
        <v-row>
            <v-col
                cols="12"
                md="4"
            >
                <dropdown-component
                    label="Is Admin"
                    :model-prop.sync="form.is_admin"
                    array="boolean"
                    :error-messages="errors?.is_admin?.[0]"
                />
            </v-col>
        </v-row>
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

    @include('pages.user.form.assets')
</x-app-layout>
