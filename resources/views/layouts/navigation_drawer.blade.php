<v-navigation-drawer
    app
    {{-- permanent --}}
    color="green darken-2"
    dark
>
    <div class="tw-flex tw-items-center tw-pl-4">
        {{-- <v-img
            src="/logo.png"
            max-width="46"
            max-height="56"
        ></v-img> --}}
        <v-list-item class="tw-h-16">
            <v-list-item-content>
                <v-list-item-title class="text-h6">
                    Library
                </v-list-item-title>
                {{-- <v-list-item-subtitle>
                    &nbsp;
                </v-list-item-subtitle> --}}
            </v-list-item-content>
        </v-list-item>
    </div>

    <v-divider></v-divider>

    <v-list
        {{-- dense
        nav --}}
    >
        {{-- <v-list-item
            href="/schools"
        >
            <v-list-item-icon>
                <v-icon>mdi-town-hall</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Schools</v-list-item-title>
            </v-list-item-content>
        </v-list-item> --}}
        <v-list-item
            href="/book"
        >
            <v-list-item-icon>
                <v-icon>mdi-bookshelf</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Books</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        @if (Auth::user()->is_admin)
        <v-list-item
            href="/user"
        >
            <v-list-item-icon>
                <v-icon>mdi-account</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Users</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        @endif
        {{-- <v-list-group
            prepend-icon="mdi-cog"
            no-action
        >
            <template v-slot:activator>
                <v-list-item-content>
                    <v-list-item-title v-text="'Setup'"></v-list-item-title>
                </v-list-item-content>
            </template>

            <v-list-item
                href="/academic-years"
                class="tw-pl-4"
            >
                <v-list-item-icon>
                    <v-icon>mdi-circle-small</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Academic Years</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item
                href="/semesters"
                class="tw-pl-4"
            >
                <v-list-item-icon>
                    <v-icon>mdi-circle-small</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Semesters</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item
                href="/year-levels"
                class="tw-pl-4"
            >
                <v-list-item-icon>
                    <v-icon>mdi-circle-small</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Year Levels</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item
                href="/courses"
                class="tw-pl-4"
            >
                <v-list-item-icon>
                    <v-icon>mdi-circle-small</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Courses</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
            <v-list-item
                href="/subjects"
                class="tw-pl-4"
            >
                <v-list-item-icon>
                    <v-icon>mdi-circle-small</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>Subjects</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list-group> --}}
    </v-list>
</v-navigation-drawer>
