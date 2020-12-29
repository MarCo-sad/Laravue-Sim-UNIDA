<template>
  <div class="wrapper">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6 text-left">
              <h1>Tabel Kerjasama</h1>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Default box -->

        <div class="card-body card-block">
          <form @submit.prevent="PostUpdate">
            <div class="form-group">
              <label class="from-control-label">Nama Kegiatan</label>
              <input
                type="text"
                class="form-control"
                v-model="activity.name"
                placeholder="Masukkan Title"
              />
              <div v-if="validation.name">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.name[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Mitra Terkait</label>
              <input
                type="number"
                class="form-control"
                v-model="activity.kerjasama_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.kerjasama_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.kerjasama_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Penyelenggara</label>
              <input
                type="number"
                class="form-control"
                v-model="activity.lembaga_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.lembaga_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.lembaga_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Deskripsi</label>
              <textarea
                class="form-control"
                v-model="activity.descriptions"
                rows="5"
                placeholder="Masukkan Deskripsi"
              ></textarea>
              <div v-if="validation.descriptions">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.descriptions[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Tanggal Kegiatan</label>
              <input
                type="date"
                class="form-control"
                v-model="activity.tgl_mulai"
                placeholder="Masukkan Format Tanggal"
              />
              <div v-if="validation.tgl_mulai">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.tgl_mulai[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Documents</label>
              <input
                type="text"
                class="form-control"
                v-model="activity.documents"
                placeholder="Masukkan Format Tanggal"
              />
              <div v-if="validation.documents">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.documents[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-md btn-success">
                UPDATE
              </button>
              <button type="reset" class="btn btn-md btn-danger">RESET</button>
            </div>
          </form>

          <!--         
        </form> -->

          <!-- /.card-body -->
          <div class="card-footer text-left">Footer</div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activity: {},
      validation: [],
    };
  },
  created() {
    let uri = `http://localhost:8000/api/activities/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.activity = response.data.data;
    });
  },
  methods: {
    PostUpdate() {
      let uri = `http://localhost:8000/api/activities/update/${this.$route.params.id}`;
      this.axios
        .post(uri, this.activity)
        .then((response) => {
          this.$router.push({ name: "TabelKegiatan" });
        })
        .catch((error) => {
          this.validation = error.response.data.data;
        });
    },
  },
};
</script>  