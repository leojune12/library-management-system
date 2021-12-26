<v-navigation-drawer
    app
    {{-- permanent --}}
    color="indigo darken-2"
    dark
>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title class="text-h6">
                Registrar
            </v-list-item-title>
            <v-list-item-subtitle>
                subtext
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>

    <v-divider></v-divider>

    <v-list
        dense
        nav
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
            href="/academic-years"
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
        >
            <v-list-item-icon>
                <v-icon>mdi-circle-small</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Subjects</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        <v-list-item
            href="/students"
        >
            <v-list-item-icon>
                <v-icon>mdi-account</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>Students</v-list-item-title>
            </v-list-item-content>
        </v-list-item>
    </v-list>
</v-navigation-drawer>
