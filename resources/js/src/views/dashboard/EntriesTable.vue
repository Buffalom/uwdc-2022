<template>

  <!-- Table Container Card -->
  <b-card
    no-body
  >
    <b-table
      small
      :fields="tableColumns"
      :items="entries"
      responsive="sm"
    >
      <!-- A virtual column -->
      <template #cell(type)="data">
        {{ data.item.type.name }}
      </template>

      <!-- A custom formatted column -->
      <template #cell(category)="data">
        {{ data.item.category.name }}
      </template>

      <!-- A custom formatted column -->
      <template #cell(time)="data">
        {{ data.item.spent_time }}h
      </template>

      <template #cell(tags)="data">
        <div>
          <b-badge
            v-for="tag in data.item.tags"
            :key="tag"
            pill
            variant="primary"
          >
            {{ tag.name }}
          </b-badge>
        </div>
      </template>
    </b-table>
  </b-card>

</template>

<script>
import {
  BCard,
  BRow,
  BCol,
  BFormInput,
  BButton,
  BTable,
  BMedia,
  BAvatar,
  BLink,
  BBadge,
  BDropdown,
  BDropdownItem,
  BPagination,
  BTooltip,
} from 'bootstrap-vue'
import vSelect from 'vue-select'
import { mapState } from 'vuex'

export default {
  components: {
    BCard,
    BRow,
    BCol,
    BFormInput,
    BButton,
    BTable,
    BMedia,
    BAvatar,
    BLink,
    BBadge,
    BDropdown,
    BDropdownItem,
    BPagination,
    BTooltip,

    vSelect,
  },

  data() {
    return {
      entries: [],

      tableColumns: [
        { key: 'date', label: '#', sortable: true },
        { key: 'type', sortable: true },
        { key: 'category', sortable: true },
        { key: 'time', sortable: true },
        { key: 'notes', sortable: false },
        { key: 'tags', sortable: false },
        { key: 'actions' },
      ],
    }
  },

  computed: {
    ...mapState('user', ['user']),
  },

  created() {
    this.fetchEntries()
  },

  methods: {
    fetchEntries() {
      this.$http.get(`/api/users/${this.user.id}/time-entries`).then(res => {
        this.entries = res.data.data
      })
    }
  },
}
</script>

<style lang="scss" scoped>
.per-page-selector {
  width: 90px;
}
</style>
