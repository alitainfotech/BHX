<template>
  <div class="mt-10 sm:mt-0">
    <div class="mt-10 flex flex-col justify-center items-center">
      <div
        class="
          shadow-[0_35px_60px_15px_rgba(0,0,0,0.1)]
          overflow-hidden
          sm:rounded-md
        "
      >
        <div class="px-4 py-5 bg-white sm:p-6">
          <button
            class="
              inline-flex
              justify-center
              py-2
              px-4
              my-10
              border border-transparent
              shadow-sm
              text-sm
              font-medium
              rounded-md
              text-white
              bg-blue-500
              hover:bg-blue-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-indigo-500
            "
            @click="addUser"
          >
            Add User
          </button>
          <table
            class="
              table-auto
              border-collapse border border-slate-400
              ...
              bg-gray-50
            "
          >
            <thead>
              <tr>
                <th class="border border-slate-300 ... p-5">First Name</th>
                <th class="border border-slate-300 ... p-5">Last Name</th>
                <th class="border border-slate-300 ... p-5">Date of Birth</th>
                <th class="border border-slate-300 ... p-5">Age</th>
                <th class="border border-slate-300 ... p-5">Email</th>
                <th class="border border-slate-300 ... p-5">Home Number</th>
                <th class="border border-slate-300 ... p-5">Mobile Number</th>
                <th class="border border-slate-300 ... p-5">Street Address</th>
                <th class="border border-slate-300 ... p-5">City</th>
                <th class="border border-slate-300 ... p-5">State</th>
                <th class="border border-slate-300 ... p-5">Zip Code</th>
                <th class="border border-slate-300 ... p-5">Local TimeZone Time</th>
                <th class="border border-slate-300 ... p-5">Edit</th>
                <th class="border border-slate-300 ... p-5">Delete</th>
              </tr>
            </thead>
            <tbody v-for="(data, index) in data" :key="index">
              <tr>
                <td class="border border-slate-300 ... p-5">
                  {{ data.first_name }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.last_name }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.date_of_birth }}
                </td>
                <td class="border border-slate-300 ... p-5">{{ data.age }}</td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.email_address }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.home_number }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.mobile_phone }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.street_address }}
                </td>
                <td class="border border-slate-300 ... p-5">{{ data.city }}</td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.state }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.zip_code }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  {{ data.home_address_current_time }}
                </td>
                <td class="border border-slate-300 ... p-5">
                  <button
                    class="
                      inline-flex
                      justify-center
                      py-2
                      px-4
                      border border-transparent
                      shadow-sm
                      text-sm
                      font-medium
                      rounded-md
                      text-white
                      bg-blue-500
                      hover:bg-blue-700
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-indigo-500
                    "
                    @click="editUser(data.id)"
                  >
                    Edit
                  </button>
                </td>
                <td class="border border-slate-300 ... p-5">
                  <button
                    class="
                      inline-flex
                      justify-center
                      py-2
                      px-4
                      border border-transparent
                      shadow-sm
                      text-sm
                      font-medium
                      rounded-md
                      text-white
                      bg-red-500
                      hover:bg-red-700
                      focus:outline-none
                      focus:ring-2
                      focus:ring-offset-2
                      focus:ring-indigo-500
                    "
                    @click="deleteUser(data.id)"
                  >
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="mt-10 flex flex-col justify-center items-center">

          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { createToaster } from "@meforma/vue-toaster";
import axios from "axios";
const toaster = createToaster({
  /* options */
});
export default {
  data() {
    return {
      show: "",
      data: "",
    };
  },
  mounted() {
    let showRec = localStorage.getItem("showRec");
    this.show = showRec;
    console.log(this.show);
    this.getUser()
  },
  methods: {
    getUser() {
      axios
        .get("http://localhost:8000/api/users")
        .then((res) => {
          this.data = res.data;
          localStorage.removeItem("uid");

        })
        .catch((err) => console.log(err));
    },
    addUser() {
      if (this.show == "true") {
        localStorage.removeItem("showRec");
        window.location.href = "/user";
      }
    },
    deleteUser(id) {
      axios
        .delete(`http://localhost:8000/api/users/${id}`)
        .then((res) => {
            this.getUser()
             toaster.show(res.data.message, {
              type: "error",
            });

        })
        .catch((err) => console.log(err));
    },
    editUser(id){
        localStorage.setItem("uid",id)
        this.addUser()
    }
  },
};
</script>

<style scoped>
</style>
