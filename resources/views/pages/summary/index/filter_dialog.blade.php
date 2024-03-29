<v-dialog
    v-model="filterDialog"
    persistent
    max-width="600px"
>
    <v-card>
        <v-card-title>
            <span class="text-h5">Filter Table</span>
        </v-card-title>
        <v-card-text>
            <v-container>
                <v-form
                    ref="advanceFilterForm"
                >
                    <v-row>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <table-dropdown-component
                                label="Academic Year"
                                :model-prop.sync="advanceFilters.academic_year_id"
                                table="academic_years"
                            />
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <table-dropdown-component
                                label="Semester"
                                :model-prop.sync="advanceFilters.semester_id"
                                table="semesters"
                            />
                        </v-col>
                    </v-row>
                </v-form>
            </v-container>
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
                color="blue darken-1"
                text
                @click="closeFilter()"
            >
                Close
            </v-btn>
            <v-btn
                color="blue darken-1"
                text
                @click="resetFilter()"
            >
                Reset
            </v-btn>
            <v-btn
                color="blue darken-1"
                text
                @click="filter()"
            >
                Filter
            </v-btn>
        </v-card-actions>
    </v-card>
</v-dialog>
