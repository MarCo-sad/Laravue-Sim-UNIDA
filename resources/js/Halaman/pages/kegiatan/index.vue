<template>
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6 text-left">
              
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h1 class="card-title">Tabel Kegiatan</h1>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Kegiatan</th>
                <th>Mitra Terkait</th>
                <th>Penyelenggara</th>
                <th>Tanggal Mulai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="activity in activities" :key="activity.name">
                <td>{{ activity.id }}</td>
                <td>{{ activity.name }}</td>
                <td>{{ activity.kerjasama_id }}</td>
                <td>{{ activity.lembaga_id }}</td>
                <td>{{ activity.tgl_mulai }}</td>
                <td class="text-center">
                  <router-link
                    :to="{ name: 'EditKegiatan', params: { id: activity.id } }"
                    class="btn btn-sm btn-primary"
                    >EDIT</router-link
                  >
                  <button
                    @click.prevent="PostDelete(activity.id, index)"
                    class="btn btn-sm btn-danger"
                  >
                    HAPUS
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- /.card-body -->
          <pagination :data="activities" @pagination-change-page="getResults"></pagination>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</template>

<script>
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/css/bootstrap.min.css";
export default {
  data() {
    return {
      activities: [
        {
          id: " ",
          name: "",
          kerjasama_id: " ",
          lembaga_id: " ",
          tgl_mulai: " "
        },
      ],
    };
  },
    mounted() {
        // Fetch initial results
        this.getResults();
    },
  created() {
    let uri = `http://localhost:8000/api/activities`;
    this.axios.get(uri).then((response) => {
      this.activities = response.data.data;
      console.log(response);
    });
  },
  methods: {
            PostDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/activities/${id}`)
                    .then(response => {
                        this.activities.splice(index, 1);
                    }).catch(error => {
                    alert('system error!');
                });
            },
            getResults(page = 1) {
            axios.get('example/results?page=' + page)
                .then(response => {
                    this.activities = response.data;
                });
        }
        }
};
</script>