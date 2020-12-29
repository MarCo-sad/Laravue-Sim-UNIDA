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
            <form @submit.prevent="PostStore">
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
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.lembaga_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.lembaga_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listLembagas.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.prodi }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.lembaga_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.lembaga_id[0] }}
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="from-control-label">Jenis Kerjasama</label>
                <input
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.jeniskerjasama_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.jeniskerjasama_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listJenisKerjasamas.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.jeniskerjasama }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.jeniskerjasama_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.jeniskerjasama_id[0] }}
                  </div>
                </div>
              </div>
              <!-- </div>
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
              </div> -->
              <div class="form-group">
                <label class="from-control-label">Benua</label>
                <input
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.benua_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.benua_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listBenuas.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.benua }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.benua_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.benua_id[0] }}
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
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
              </div> -->

              <div class="form-group">
                <label class="from-control-label">Negara</label>
                <input
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.negara_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.negara_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listNegaras.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.name }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.negara_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.negara_id[0] }}
                  </div>
                </div>
              </div>
<!--               
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
              </div> -->

              <div class="form-group">
                <label class="from-control-label">Kota</label>
                <input
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.kota_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.kota_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listKotas.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.kota }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.kota_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.kota_id[0] }}
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
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
              </div> -->
              <div class="form-group">
                <label class="from-control-label">Bidang Pengaju</label>
                <input
                  type="hidden"
                  class="form-control"
                  v-model="cooperation.bidang_id"
                />
                <div class="col-sm-10">
                  <select
                    v-model="cooperation.bidang_id"
                    class="form-control col-lg-4 col-sm-12"
                  >
                    <option
                      v-for="value in listBidangs.data"
                      v-bind:key="value.id"
                      :value="value.id"
                    >
                      {{ value.bidang }}
                    </option>
                  </select>
                  <div
                    v-if="allerrors.bidang_id"
                    :class="['alert alert-danger']"
                  >
                    {{ allerrors.bidang_id[0] }}
                  </div>
                </div>
              </div>

              <!-- <div class="form-group">
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
              </div> -->

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
                  SIMPAN
                </button>
                <button type="reset" class="btn btn-md btn-danger">
                  RESET
                </button>
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
      lembagas: {},
      listLembagas: {},
      validation: [],
      lembaga_id: 0,
      jeniskerjasamas: {},
      listJenisKerjasamas: {},
      jeniskerjasama_id: 0,
      benuas: {},
      listBenuas: {},
      benua_id: 0,
      negaras: {},
      listNegaras: {},
      negara_id: {},
      kotas: {},
      listKotas: {},
      kota_id: {},
      bidangs: {},
      listBidangs: {},
      bidang_id: {},
      allerrors: []
    };
  },
  created() {
    let uri = `/api/lembaga/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.lembagas = response.data;

      this.cooperation.lembaga_id = response.data.id;
    });

    uri = `/api/lembaga`;
    axios.get(uri).then((response) => {
      this.listLembagas = response.data;
    });

    uri = `/api/jeniskerjasama/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.jeniskerjasamas = response.data;

      this.cooperation.jeniskerjasama_id = response.data.id;
    });

    uri = `/api/jeniskerjasama`;
    axios.get(uri).then((response) => {
      this.listJenisKerjasamas = response.data;
    });

    uri = `/api/benua/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.benuas = response.data;

      this.cooperation.benua_id = response.data.id;
    });

    uri = `/api/benua`;
    axios.get(uri).then((response) => {
      this.listBenuas = response.data;
    });

    uri = `/api/negara/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.negaras = response.data;

      this.cooperation.negara_id = response.data.id;
    });

    uri = `/api/negara`;
    axios.get(uri).then((response) => {
      this.listNegaras = response.data;
    });

    uri = `/api/kota/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.kotas = response.data;

      this.cooperation.kota_id = response.data.id;
    });

    uri = `/api/kota`;
    axios.get(uri).then((response) => {
      this.listKotas = response.data;
    });

    uri = `/api/bidang/fetch/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.bidangs = response.data;

      this.cooperation.bidang_id = response.data.id;
    });

    uri = `/api/bidang`;
    axios.get(uri).then((response) => {
      this.listBidangs = response.data;
    });

  },
  methods: {
    PostStore() {
      let uri = "http://localhost:8000/api/cooperations/store";
      this.axios
        .post(uri, this.cooperation)
        .then((response) => {
          this.$router.push({
            name: "TabelKerjasama",
          });
        })
        .catch((error) => {
          this.validation = error.response.data.data;
        });
    },
  },
};
</script>