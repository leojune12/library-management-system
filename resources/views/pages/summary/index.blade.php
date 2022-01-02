@section('title', isset($title) ? ' | ' . $title : '')
<x-app-layout>
    <div class="tw-flex">
        <v-list-item
            class="tw-pl-0"
            two-line
        >
            <v-list-item-content>
                <v-list-item-title class="text-h6">
                    {{ $title }}
                </v-list-item-title>
                <v-list-item-subtitle>
                    ({{ $semester }}, A.Y. {{ $academic_year }})
                </v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>

        <v-btn
            tile
            color="warning"
            small
            @click="filterDialog = true"
        >
            <v-icon left>
                mdi-filter
            </v-icon>
            Filter
        </v-btn>
    </div>

    <v-simple-table
        dense
    >
        <template v-slot:default>
            <thead>
                <tr>
                <th class="text-left">
                    Curricular Program/s
                </th>
                <th class="text-left">
                    Year Level
                </th>
                <th class="text-left">
                    Male
                </th>
                <th class="text-left">
                    Female
                </th>
                <th class="text-left">
                    Total
                </th>
                </tr>
            </thead>
            <tbody
                v-for="(item, index) in items"
                :key="index"
                class="tw-border-b"
            >
                <tr
                    v-for="(i, j) in item"
                    :key="j"
                >
                    <td rowspan="4" v-if="j == '1'">
                        <b>
                            @{{ index }}
                        </b>
                    </td>
                    <td>@{{ j }}</td>
                    <td>@{{ i.male }}</td>
                    <td>@{{ i.female }}</td>
                    <td>@{{ i.total }}</td>
                </tr>
            </tbody>
            <tbody class="tw-border-b">
                <tr>
                    <td
                        colspan="2"
                        class="tw-text-right"
                    >
                        <b>Grand Total</b>
                    </td>
                    <td>
                        <b>
                            @{{ total.males }}
                        </b>
                    </td>
                    <td>
                        <b>
                            @{{ total.females }}
                        </b>
                    </td>
                    <td>
                        <b>
                            @{{ total.students }}
                        </b>
                    </td>
                </tr>
            </tbody>
        </template>
    </v-simple-table>

    @include('pages.summary.index.assets')
    @include('pages.summary.index.filter_dialog')
</x-app-layout>
