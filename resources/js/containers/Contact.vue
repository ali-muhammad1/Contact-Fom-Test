<template>
        <div class="main-wrapper-login">
            <div class="login-form-wrapper">
                <!-- <div v-if="success" class="alert alert-danger">{{success}}</div> -->
                <template  v-if="success">
                  <div class="success-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Submitted</strong>
                    <span class="block sm:inline">{{success}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3"></span>
                  </div>
                </template>
                <!-- <form>
                    <div v-if="error" class="alert alert-danger">{{error}}</div>
                    <div class="form-group">
                        <input type="email" v-model="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" v-model="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <label class="check-label" id="remember">Remember me
                            <input type="checkbox" for="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <input type="button" onclick="handleSubmit()" class="btn" value="Login">
                    <input type="button" v-on:click="handleSubmit()" class="btn" value="Login">
                </form> -->

                <form class="w-full max-w-sm">
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        * Name 
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Name" v-model="name">
                      <label for=""></label>
                    </div>
                  </div>
                  
                  <template v-if="error && error.name">
                    <div class="error-message" role="alert">
                      <span class="block sm:inline">{{ error.name[0]}}</span>
                    </div>
                  </template>
                    
                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        * Email
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Email" v-model="email">
                    </div>
                  </div>
                  <template v-if="error && error.email">
                    <div class="error-message" role="alert">
                      <span class="block sm:inline">{{ error.email[0]}}</span>
                    </div>
                  </template>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
                        * Phone
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-username" type="text" placeholder="Phone" v-model="phone">
                    </div>
                  </div>
                  <template v-if="error && error.phone">
                    <div class="error-message" role="alert">
                      <span class="block sm:inline">{{ error.phone[0]}}</span>
                    </div>
                  </template>

                  <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-username">
                        * Message
                      </label>
                    </div>
                    <div class="md:w-2/3">
                      <textarea rows="6" class="text-message resize border rounded focus:outline-none focus:shadow-outline" v-model="message"></textarea>
                    </div>
                  </div>
                  <template v-if="error && error.message">
                    <div class="error-message" role="alert">
                      <span class="block sm:inline">{{ error.message[0]}}</span>
                    </div>
                  </template>

                  <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                      <button v-on:click="handleSubmit()" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                        Submit
                      </button>
                    </div>
                  </div>
                </form>
            </div>
        </div>
</template>
<script>
    export default {
        data() {
            return {
                name: '',
                email: '',
                phone: '',
                message: '',
                error: '',
                success: '',
                isLoggedIn: this.$store.getters.isLoggedIn
            }
        },
        created() {
            if(this.isLoggedIn) {
                this.$router.push('/dashboard');
            }
        },
        mounted() {
            console.log('Login Component mounted.')
        },
        methods: {
          handleSubmit() {
              // if(this.name == '' || this.email == '' || this.phone == '' || this.message == '') {
              //     this.error = 'Please provide required fields';
              //     return false;
              // }

              this.$store.dispatch('inquiry', {
                  name: this.name,
                  email: this.email,
                  phone: this.phone,
                  message: this.message
              })
              .then((response) => {
                  if(response){
                    this.success = 'Inquiry has been successfully submitted'
                    this.name = ''
                    this.email = ''
                    this.phone = ''
                    this.message = ''
                    this.error = ''
                  }
              })
              .catch(err => {
                this.error = err.data
              });
          }
        }
    }
</script>
