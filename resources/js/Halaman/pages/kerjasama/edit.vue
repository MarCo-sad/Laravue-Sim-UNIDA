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
              <label class="from-control-label">Nama Mitra</label>
              <input
                type="text"
                class="form-control"
                v-model="cooperation.name"
                placeholder="Masukkan Title"
              />
              <div v-if="validation.name">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.name[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Lembaga Pengaju</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.lembaga_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.lembaga_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.lembaga_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Jenis Kerjasama</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.jeniskerjasama_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.jeniskerjasama_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.jeniskerjasama_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Benua</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.benua_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.benua_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.benua_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Negara</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.negara_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.negara_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.negara_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Kota</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.kota_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.kota_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.kota_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Bidang Pengaju</label>
              <input
                type="number"
                class="form-control"
                v-model="cooperation.bidang_id"
                placeholder="Masukkan Lembaga Angka dulu"
              />
              <div v-if="validation.bidang_id">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.bidang_id[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Dari Tanggal</label>
              <input
                type="date"
                class="form-control"
                v-model="cooperation.tgl_mulai"
                placeholder="Masukkan Format Tanggal"
              />
              <div v-if="validation.tgl_mulai">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.tgl_mulai[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Sampai Tanggal</label>
              <input
                type="date"
                class="form-control"
                v-model="cooperation.tgl_berakhir"
                placeholder="Masukkan Format Tanggal"
              />
              <div v-if="validation.tgl_berakhir">
                <div class="alert alert-danger mt-1" role="alert">
                  {{ validation.tgl_berakhir[0] }}
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="from-control-label">Documents</label>
              <input
                type="text"
                class="form-control"
                v-model="cooperation.documents"
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
      cooperation: {},
      validation: [],
    };
  },
  created() {
    let uri = `http://localhost:8000/api/cooperations/${this.$route.params.id}`;
    this.axios.get(uri).then((response) => {
      this.cooperation = response.data.data;
    });
  },
  methods: {
    PostUpdate() {
      let uri = `http://localhost:8000/api/cooperations/update/${this.$route.params.id}`;
      this.axios
        .post(uri, this.cooperation)
        .then((response) => {
          this.$router.push({ name: "TabelKerjasama" });
        })
        .catch((error) => {
          this.validation = error.response.data.data;
        });
    },
  },
};
</script>  