<v-app-bar
    absolute
    color="red darken-2"
    dark
    {{-- shrink-on-scroll --}}
    {{-- prominent --}}
    {{-- scroll-target="#scrolling-techniques" --}}
    app
>
    {{-- <v-app-bar-nav-icon></v-app-bar-nav-icon> --}}

    {{-- <v-app-bar-title>Title</v-app-bar-title> --}}

    <v-spacer></v-spacer>

    {{-- <v-btn icon>
    <v-icon>mdi-magnify</v-icon>
    </v-btn> --}}

    {{-- <v-btn icon>
    <v-icon>mdi-heart</v-icon>
    </v-btn> --}}

    <span class="tw-mr-3">
        {{ Auth::user()->name }}
    </span>

    <v-menu
        bottom
        left
        {{-- offset-x --}}
        offset-y
    >
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                dark
                icon
                v-bind="attrs"
                v-on="on"
            >
                <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
        </template>

        <v-list>
            <v-list-item>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <v-list-item-title>
                        <v-btn
                            type="submit"
                            text
                            class="tw-pl-0"
                        >
                            Logout
                        </v-btn>
                    </v-list-item-title>
                </form>
            </v-list-item>
        </v-list>
    </v-menu>

    {{-- <v-btn icon>
    <v-icon>mdi-dots-vertical</v-icon>
    </v-btn> --}}
</v-app-bar>
