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
        Logout
      </b-button>
    </div>

    <b-navbar-nav class="nav align-items-center ml-auto">
      <div class="d-sm-flex flex-column align-items-end d-none user-nav mr-2">
        <p class="user-name font-weight-bolder mb-0">
          John Doe
        </p>
        <span class="user-status text-muted">Competitor</span>
      </div>

      <b-button
        variant="outline-secondary"
        @click="logout()"
      >
        Logout
      </b-button>
    </b-navbar-nav>
  </div>
</template>

<script>
import {
  BLink, BNavbarNav, BButton,
} from 'bootstrap-vue'
import DarkToggler from '@core/layouts/components/app-navbar/components/DarkToggler.vue'
import jwt from '@/auth/jwt/useJwt'

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

  methods: {
    async logout() {
      try {
        await this.$http.get('/api/auth/logout')
      } catch (error) {
        console.dir(error)
      } finally {
        this.$router.push('/login')
      }
    },
    async addNewEntry() {
      console.log('Adding new entry')
    },
  }
}
</script>
