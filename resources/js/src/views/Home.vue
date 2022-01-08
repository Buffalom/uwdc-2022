<template>
  <div v-if="user && user.id">
    <b-row>
      <b-col>
        <b-card
          no-body
        >
          <b-card-header>
            <h4 class="mb-0">
              Goal Overview
            </h4>
          </b-card-header>

          <b-row class="text-center mx-0">
            <b-col
              cols="6"
              class="border-top border-right d-flex align-items-between flex-column py-1"
            >
              <b-card-text class="text-muted mb-0">
                Total
              </b-card-text>
              <h3 class="font-weight-bolder mb-0">
                19.5h
              </h3>
            </b-col>

            <b-col
              cols="6"
              class="border-top d-flex align-items-between flex-column py-1"
            >
              <b-card-text class="text-muted mb-0">
                Last month
              </b-card-text>
              <h3 class="font-weight-bolder mb-0">
                13.5h
              </h3>
            </b-col>
          </b-row>
        </b-card>
      </b-col>

      <b-col md="8">
        <EntriesTable />
      </b-col>
    </b-row>
  </div>
</template>

<script>
import { BRow, BCol, BCard, BCardText, BLink, BCardHeader } from 'bootstrap-vue'
import EntriesTable from '@/views/dashboard/EntriesTable'
import { mapState } from 'vuex'


export default {
  components: {
    BCardHeader,
    BRow,
    BCol,
    BCard,
    BCardText,
    BLink,
    EntriesTable,
  },

  computed: {
    ...mapState('user', ['user']),
  },

  created() {
    this.$store.dispatch('user/fetchUser')
  },
}
</script>

<style>

</style>
