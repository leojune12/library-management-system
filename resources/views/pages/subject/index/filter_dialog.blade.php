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
                            <v-text-field
                                dense
                                clearable
                                label="Name"
                                v-model="advanceFilters.name"
                            ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <v-text-field
                                type="number"
                                dense
                                clearable
                                label="Units"
                                v-model="advanceFilters.units"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <table-dropdown-component
                                label="Year Level"
                                :model-prop.sync="advanceFilters.year_level_id"
                                table="year_levels"
                            />
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                            <autocomplete-component
                                label="Course"
                                table="courses"
                                :default-value="advanceFilters.course_id"
                                :model-prop.sync="advanceFilters.course_id"
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
