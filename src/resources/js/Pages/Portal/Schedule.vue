<template>
  <portal-layout>
    <template v-slot:page-title>
      Schedule
    </template>
    <section class="container mx-auto">
      <div class="my-8 md:my-16">
        <div class="">
          <div class="right">
            <label
              for="display-timezone"
              class="label pr-4"
            >
              Timezone
            </label>
            <select
              id="display-timezone"
              class="select "
              v-model="displayTimeZone"
            >
              <option>{{ localTimeZone }}</option>
              <option v-if="localTimeZone !== 'EST'">EST</option>
            </select>
          </div>
        </div>
        <article
          class="card"
          v-for="date in Object.keys(events)"
          :key="date"
        >
          <h2 class="title">
            {{ date }}
          </h2>
          <table>
            <tr>
              <th>Start</th>
              <th>End</th>
              <th>Type</th>
              <th>Event</th>
            </tr>
            <tr
              v-for="event in events[date]"
              :key="event.event"
            >
              <td v-if="displayTimeZone !== 'EST'">{{ event.startLocal }}</td>
              <td v-if="displayTimeZone === 'EST'">{{ event.startEST }}</td>
              <td v-if="displayTimeZone !== 'EST'">{{ event.endLocal }}</td>
              <td v-if="displayTimeZone === 'EST'">{{ event.endEST }}</td>
              <td>{{ event.type }}</td>
              <td>{{ event.event }}</td>
              <td>
                <div class="right">
                  <a
                    :href="event.url"
                    class="button disabled"
                  >
                    Attend
                  </a>
                </div>
              </td>
            </tr>
          </table>
        </article>
      </div>
    </section>
  </portal-layout>
</template>

<script>
import PortalLayout from "../../Layouts/PortalLayout";
import FormWrapper from "../../Components/Portal/FormWrapper";
import { DateTime, LocalZone } from 'luxon';
export default {
  name: "Schedule",
  props: {
    'schedule': {
      type: Array,
      default: []
    }
  },
  components: {
    PortalLayout,
    FormWrapper,
  },
  data: function() {
    return {
      localTimeZone: DateTime.local().offsetNameShort,
      displayTimeZone: DateTime.local().offsetNameShort,
    }
  },
  computed: {
    events: function() {
      // Get the distinct event dates
      let events = {};
      this.$props.schedule.forEach((event) => {
        let date = DateTime.fromSQL(event.date)
          .toLocaleString({
            weekday: 'long',
            month: 'long',
            day: '2-digit',
          });
        if(!events.hasOwnProperty(date)) {
          events[date] = [];
        }
        events[date].push({
          startLocal: DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            }),
          startEST: DateTime.fromSQL(event.date + ' ' + event.start, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            }),
          endLocal: DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .setZone('local')
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            }),
          endEST: DateTime.fromSQL(event.date + ' ' + event.end, {
            zone: 'America/New_York',
          })
            .toLocaleString({
              hour: '2-digit',
              minute: '2-digit',
              hour12: true,
            }),
          type: event.type,
          event: event.event,
          url: event.url,
        });
      });
      return events;
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../../../css/_utilities";
.card {
  @apply flex flex-col w-full bg-white p-8 shadow-md;
  &:not(:first-child) {
    @apply mt-8;
  }
  .title {
    @apply font-primary font-bold text-primary text-xl;
  }
  table {
    @apply w-full mt-4;
    tr {
      @apply w-full p-2 grid grid-cols-8 border-b border-gray-100 flex-col items-center;
      &:first-child {
        @apply border-gray-300;
      }
      th {
        @apply text-left font-primary font-semibold text-base text-dark;
        &:nth-child(4) {
          @apply col-span-4;
        }
      }
      td {
        @apply text-left font-primary font-normal text-base text-dark;
        &:nth-child(4) {
          @apply col-span-4;
        }
        .button {
          @apply inline-block px-4 py-1 bg-primary rounded shadow-sm font-primary font-normal text-base text-light;
          &:hover {
            @apply bg-secondary;
          }
        }
        .disabled {
          @apply bg-gray-200 text-white;
          &:hover {
            @apply bg-gray-200;
          }
        }
      }
    }
    .archived {
      @apply line-through;
    }
  }
}
.right {
  @apply flex justify-end;
}
.select {
  appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23a0aec0' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: center right 1rem;
  background-size: 1rem;
  @apply py-1 pl-3 pr-10 text-base shadow-md;
  &:focus {
    @apply border-0 outline-none;
    background-image: url("data:image/svg+xml,%3Csvg aria-hidden='true' focusable='false' data-prefix='fas' data-icon='chevron-down' class='svg-inline--fa fa-chevron-down fa-w-14' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3E%3Cpath fill='%23330b53' d='M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z'%3E%3C/path%3E%3C/svg%3E");
  }
}
.label {
  @apply block py-1 px-3 bg-primary font-normal text-light text-base font-primary shadow-md;
}
</style>
