<template>
  <div class="navbar-container d-flex content align-items-center">

    <!-- Nav Menu Toggler -->
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item">
        <b-link
          class="nav-link"
          @click="toggleVerticalMenuActive"
        >
          <feather-icon
            icon="MenuIcon"
            size="21"
          />
        </b-link>
      </li>
    </ul>

    <!-- Left Col -->
    <div class="bookmark-wrapper align-items-center flex-grow-1 d-none d-lg-flex">
      <b-button
        variant="primary"
        @click="addNewEntry()"
      >
        Add Entry
      </b-button>
    </div>

    <b-navbar-nav class="nav align-items-center ml-auto">
      <div v-if="user" class="d-sm-flex flex-column align-items-end d-none user-nav mr-2">
        <p class="user-name font-weight-bolder mb-0">
          {{ user.name }}
        </p>
        <span class="user-status text-muted">Competitor</span>
      </div>

      <b-button
        v-if="isLoggedIn"
        variant="outline-secondary"
        @click="logout()"
      >
        Logout
      </b-button>
      <a v-else href="/login">
      <b-button variant="primary">
        Login
      </b-button>
      </a>
    </b-navbar-nav>
  </div>
</template>

<script>
import {
  BLink, BNavbarNav, BButton,
} from 'bootstrap-vue'
import DarkToggler from '@core/layouts/components/app-navbar/components/DarkToggler.vue'
import jwt from '@/auth/jwt/useJwt'
import { mapState } from 'vuex'

export default {
  components: {
    BLink,
    BNavbarNav,
    BButton,

    // Navbar Components
    DarkToggler,
  },
  props: {
    toggleVerticalMenuActive: {
      type: Function,
      default: () => {},
    },
  },

  computed: {
    ...mapState('user', ['user']),

    isLoggedIn() {
      return !!this.user
    }
  },

  methods: {
    async logout() {
      try {
        await this.$http.get('/api/auth/logout')
      } catch (error) {
        console.dir(error)
      } finally {
        jwt.setToken(null)
        this.$router.push('/login')
      }
    },
    async addNewEntry() {
      console.log('Adding new entry')
    },
  }
}
</script>
