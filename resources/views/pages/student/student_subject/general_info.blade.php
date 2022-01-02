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
