<template >
  <AppHeader />
  <div class="mt-10 sm:mt-0" v-if="this.toShowRec === false">
    <div class="mt-10 flex flex-col justify-center items-center">
      <div class="mt-5 md:mt-0 md:col-span-2">
        <Form
          @submit="onSubmit"
          :validation-schema="schema"
          method="POST"
          v-slot="{ errors }"
        >
          <div
            class="
              shadow-[0_35px_60px_15px_rgba(0,0,0,0.1)]
              overflow-hidden
              sm:rounded-md
            "
          >
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="first_name"
                    class="block text-sm font-medium text-gray-700"
                    >First name</label
                  >
                  <Field
                    type="text"
                    name="first_name"
                    id="first_name"
                    autocomplete="given-name"
                    v-model="user.first_name"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.first_name }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.first_name }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="last_name"
                    class="block text-sm font-medium text-gray-700"
                    >Last name</label
                  >
                  <Field
                    type="text"
                    name="last_name"
                    id="last_name"
                    v-model="user.last_name"
                    autocomplete="last_name"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.last_name }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.last_name }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="date_of_birth"
                    class="block text-sm font-medium text-gray-700"
                    >Date Of Birth</label
                  >
                  <Field
                    type="date"
                    name="date_of_birth"
                    id="date_of_birth"
                    v-model="user.date_of_birth"
                    autocomplete="off"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.date_of_birth }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.date_of_birth }}
                  </div>
                </div>
                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="age"
                    class="block text-sm font-medium text-gray-700"
                    >Age</label
                  >
                  <Field
                    type="text"
                    name="age"
                    id="age"
                    v-model="user.age"
                    autocomplete="off"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.age }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.age }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="home_number"
                    class="block text-sm font-medium text-gray-700"
                    >Home Phone</label
                  >
                  <Field
                    type="text"
                    name="home_number"
                    id="home_number"
                    v-model="user.home_number"
                    autocomplete="off"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.home_number }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.home_number }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label
                    for="mobile_phone"
                    class="block text-sm font-medium text-gray-700"
                    >Mobile Phone</label
                  >
                  <Field
                    type="text"
                    name="mobile_phone"
                    id="mobile_phone"
                    v-model="user.mobile_phone"
                    autocomplete="off"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.mobile_phone }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.mobile_phone }}
                  </div>
                </div>
                <div class="col-span-6 sm:col-span-6">
                  <label
                    for="email_address"
                    class="block text-sm font-medium text-gray-700"
                    >email address
                  </label>
                  <Field
                    type="email"
                    name="email_address"
                    id="email_address"
                    v-model="user.email_address"
                    autocomplete="email"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.email_address }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.email_address }}
                  </div>
                </div>

                <div class="col-span-6">
                  <label
                    for="street_address"
                    class="block text-sm font-medium text-gray-700"
                    >Street address</label
                  >
                  <Field
                    type="text"
                    name="street_address"
                    id="street_address"
                    v-model="user.street_address"
                    autocomplete="street_address"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.street_address }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.street_address }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                  <label
                    for="city"
                    class="block text-sm font-medium text-gray-700"
                    >City</label
                  >
                  <Field
                    type="text"
                    name="city"
                    id="city"
                    v-model="user.city"
                    autocomplete="address-level2"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.city }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.city }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label
                    for="state"
                    class="block text-sm font-medium text-gray-700"
                    >State / Province</label
                  >
                  <Field
                    type="text"
                    name="state"
                    id="state"
                    v-model="user.state"
                    autocomplete="address-level1"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.state }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.state }}
                  </div>
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                  <label
                    for="zip_code"
                    class="block text-sm font-medium text-gray-700"
                    >ZIP / Postal code</label
                  >
                  <Field
                    type="text"
                    name="zip_code"
                    id="zip_code"
                    v-model="user.zip_code"
                    autocomplete="zip_code"
                    class="
                      mt-1
                      focus:ring-indigo-500 focus:border-indigo-500
                      block
                      w-full
                      shadow-sm
                      sm:text-sm
                      border-gray-300
                      rounded-md
                    "
                    :class="{ 'is-invalid': errors.zip_code }"
                  />
                  <div class="invalid-feedback text-red-400">
                    {{ errors.zip_code }}
                  </div>
                </div>
              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button
                type="submit"
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
                  bg-indigo-600
                  hover:bg-indigo-700
                  focus:outline-none
                  focus:ring-2
                  focus:ring-offset-2
                  focus:ring-indigo-500
                "
              >
                Save
              </button>
            </div>
          </div>
        </Form>
      </div>
    </div>
  </div>
  <Records v-else />
</template>

<script>
import AppHeader from "../../Partials/AppHeader.vue";
import { Form, Field } from "vee-validate";
import * as Yup from "yup";
import axios from "axios";
import { createToaster } from "@meforma/vue-toaster";
import Records from "../Users/Records.vue";
import { ref } from "vue";

const toaster = createToaster({
  /* options */
});
const flag = ref(false);

export default {
  components: {
    AppHeader,
    Form,
    Field,
    Records,
  },
  methods: {
    onSubmit() {
      let number_reg = /^\(?\d{3}?\)??-??\(?\d{3}?\)??-??\(?\d{4}?\)??-?$/
      let dob_reg = /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/
      if (
        this.user.first_name == "" ||
        this.user.last_name == "" ||
        this.user.zip_code == "" ||
        this.user.date_of_birth == "" ||
        this.user.email_address == "" ||
        this.user.home_number == ""||
        this.user.mobile_phone == "" ||
        this.user.city == ""||
        this.user.street_address  == ""||
        this.user.state == ""||
        this.user.age==""
      ) {
        toaster.show("Please Fill all the required details !", {
                  type: "error",
                });
      }else if(number_reg.test(this.user.home_number)==false){
            toaster.show("Please Enter a Valid Phone Number !", {
                  type: "error",
                });

      }else if(number_reg.test(this.user.mobile_phone)==false){
            toaster.show("Please Enter a Valid Phone Number !", {
                  type: "error",
                });

      } else if(dob_reg.test(this.user.date_of_birth)==false){
            toaster.show("Please Enter a Valid Date of Birth !", {
                  type: "error",
                });

      }else if(isNaN(this.user.age)==true){
            toaster.show("Please Enter a Valid Age Number !", {
                  type: "error",
                });

      }
      else if(isNaN(this.user.zip_code)==true){
            toaster.show("Please Enter a Valid Zip Code !", {
                  type: "error",
                });

      }
      else {
        this.isUpdateData
          ? axios
              .put(`http://localhost:8000/api/users/${this.uid}`, this.user)
              .then((res) => {
                toaster.show(res.data.message, {
                  type: "success",
                });
                this.toShowRec = true;
                localStorage.setItem("showRec", this.toShowRec);
              })
              .catch((err) => console.log(err))
          : axios
              .post("http://localhost:8000/api/users", this.user)
              .then((res) => {
                this.toShowRec = true;
                localStorage.setItem("showRec", this.toShowRec);
                toaster.show(res.data.message, {
                  type: "success",
                });
              })
              .catch((err) => {
                console.log(err);
              });
      }
    },
  },
  mounted() {
    let uid = localStorage.getItem("uid");
    this.uid = uid;
    this.uid
      ? axios
          .get(`http://localhost:8000/api/users/${this.uid}`)
          .then((res) => {
            this.data = res.data.data;
            this.isUpdateData = true;
            this.user.first_name = this.data.first_name;
            this.user.last_name = this.data.last_name;
            this.user.date_of_birth = this.data.date_of_birth;
            this.user.age = this.data.age;
            this.user.home_number = this.data.home_number;
            this.user.mobile_phone = this.data.mobile_phone;
            this.user.email_address = this.data.email_address;
            this.user.street_address = this.data.street_address;
            this.user.city = this.data.city;
            this.user.state = this.data.state;
            this.user.zip_code = this.data.zip_code;
          })
          .catch((err) => console.log(err))
      : "";
  },

  data() {
    return {
      toShowRec: localStorage.getItem("showRec")
        ? localStorage.getItem("showRec")
        : false,
      uid: 0,
      data: "",
      isUpdateData: false,
      user: {
        first_name: "",
        last_name: "",
        date_of_birth: "",
        age: "",
        home_number: "",
        mobile_phone: "",
        email_address: "",
        street_address: "",
        city: "",
        state: "",
        zip_code: "",
      },
    };
  },
};
</script>
