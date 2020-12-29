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
            <h3 class="card-title">Tabel Kerjasama</h3>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Mitra</th>
                <th>Lembaga</th>
                <th>Jenis Kerjasama</th>
                <th>Negara Asal</th>
                <th>Bidang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cooperation in cooperations" :key="cooperation.name">
                <td>{{ cooperation.id  }}</td>
                <td>{{ cooperation.name }}</td>
                <td>{{ cooperation.lembaga_id }}</td>
                <td>{{ cooperation.jeniskerjasama_id }}</td>
                <td>{{ cooperation.negara_id }}</td>
                <td>{{ cooperation.bidang_id }}</td>
                <td class="text-center">
                  <router-link
                    :to="{ name: 'EditKerjasama', params: { id: cooperation.id } }"
                    class="btn btn-sm btn-primary"
                    >EDIT</router-link
                  >
                  <button
                    @click.prevent="PostDelete(cooperation.id, index)"
                    class="btn btn-sm btn-danger"
                  >
                    HAPUS
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- /.card-body -->
          <div class="card-footer text-left">Pagination Place</div>
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
      cooperations: [
        {
          id: " ",
          name: "",
          lembaga_id: " ",
          jeniskerjasama_id: " ",
          negara_id: " ",
          bidang_id: " ",
        },
      ],
    };
  },
   
  created() {
    let uri = `http://localhost:8000/api/cooperations`;
    this.axios.get(uri).then((response) => {
      this.cooperations = response.data.data;
      console.log(response);
    });
  },
  methods: {
            PostDelete(id, index)
            {
                this.axios.delete(`http://localhost:8000/api/cooperations/${id}`)
                    .then(response => {
                        this.cooperations.splice(index, 1);
                    }).catch(error => {
                    alert('system error!');
                });
            }
        }
};
</script>