<template>
     <div
      class="ud-header absolute left-0 top-0 z-40 flex w-full items-center bg-transparent"
    >
      <div class="container">
        <div class="relative -mx-4 flex items-center justify-between">
          <div class="w-60 max-w-full px-4">
            <a href="index.html" class="navbar-logo block w-full py-5">
              <img
                src="@/assets/images/logo/logo.png"
                alt="logo"
                class="header-logo w-full"
              />
            </a>
          </div>
          <div class="flex w-full items-center justify-between px-4">
            <div>
              <button
                id="navbarToggler"
                class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden"
              >
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                <span
                  class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
              </button>
              <nav
                id="navbarCollapse"
                class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark-2 lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:px-4 lg:py-0 lg:shadow-none dark:lg:bg-transparent xl:px-6"
              >


              </nav>
            </div>
            <div class="flex items-center justify-end pr-16 lg:pr-0">
              <div class="hidden sm:flex">
                <router-link
                  to="/auth"
                  class="rounded-md bg-primary bg-opacity-20 px-6 py-2 ml-7 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100"
                >
                  Get Started
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

