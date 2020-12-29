<template>
  <div>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <h1 href="#" class="brand-link">
        <span class="brand-text font-weight-light">Biro Kerjasama</span>
      </h1>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul
            class="nav nav-pills nav-sidebar flex-column"
            data-widget="treeview"
            role="menu"
            data-accordion="false"
          >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <router-link :to="{ name: 'DashboardAdmin' }">Dashboard</router-link>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-copy"></i>
                <router-link to="/admin/tabel/kerjasama">
                  Tabel Kerjasama
                  <span class="badge badge-info right"></span>
                </router-link>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-copy"></i>
                <router-link :to="{ name: 'TabelKegiatanAdmin' }">
                  Tabel Kegiatan
                  <span class="badge badge-info right"></span>
                </router-link>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-copy"></i>
                <router-link :to="{ name: 'FormatPengajuanAdmin' }">
                  Format Pengajuan
                  <span class="badge badge-info right"></span>
                </router-link>
              </a>
            </li>

            <li class="menu-title text-white">Tambah Data</li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon far fa-plus-square"></i>
                <router-link :to="{ name: 'CreateKerjasamaAdmin' }">
                  Data Kerjasama
                  <span class="badge badge-info right"></span>
                </router-link>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon far fa-plus-square"></i>
                <router-link :to="{ name: 'CreateKegiatanAdmin' }">
                  Data Kegiatan
                  <span class="badge badge-info right"></span>
                </router-link>
              </a>
            </li>

            <li class="menu-title text-white">Manajemen user</li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-user-friends"></i>
                <!-- <router-link :to="{ name: 'CreateKerjasama' }">
                  User
                  <span class="badge badge-info right"></span>
                </router-link> -->
                <p>
                  User
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link text-left">
                <i class="nav-icon fas fa-user"></i>
                <!-- <router-link :to="{name: 'Home'}">Home</router-link> -->
                <p>
                  Login
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.css";

export default {
  name: "SidebarMou",
};
</script>