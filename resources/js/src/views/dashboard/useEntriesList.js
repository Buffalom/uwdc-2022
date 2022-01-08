import { ref, watch, computed } from '@vue/composition-api'
import store from '@/store'

// Notification
import { useToast } from 'vue-toastification/composition'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default function useEntriesList() {
  // Table Handlers
  const tableColumns = [
    { key: 'date', label: '#', sortable: true },
    { key: 'type', sortable: true },
    { key: 'category', sortable: true },
    { key: 'time', sortable: true },
    { key: 'notes', sortable: false },
    { key: 'tags', sortable: false },
    { key: 'actions' },
  ]
  const sortBy = ref('id')
  const isSortDirDesc = ref(true)

  const fetchEntries = (ctx, callback) => {
    callback([])
  }

  // *===============================================---*
  // *--------- UI ---------------------------------------*
  // *===============================================---*

  return {
    tableColumns,
    fetchEntries,
    sortBy,
    isSortDirDesc,
  }
}
