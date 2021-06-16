<template>
  <div>
    <q-card>
      <q-card-section>
        <div class="text-h6">
          <q-icon size="sm" name="fas fa-check" /> Catálogo de Localidades
          <q-btn
            class="float-right"
            round
            size="sm"
            @click="$router.push('/localidades/create')"
            outline
            color="primary"
            icon="fas fa-plus"
            v-if="canShow('localidades-edit')"
          />
        </div>
        <q-select
          color="lime-2"
          filled
          v-model="model"
          label="Entidad Federativa"
          :options="options"
        >
          <template v-slot:prepend>
            <q-icon name="event" />
          </template>
        </q-select>
      </q-card-section>
    </q-card>
    <Table />
  </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
const http = require("http");

export default {
  data() {
    return {
      data: [],
      model: body.toString(),
      options: [
        "body.entidad_nombre"
      ],
    };
  },
  mounted() {
    this.thisEntidades();
  },
  methods: {
    thisEntidades() {
      const options = {
        method: "POST",
        hostname: "localhost",
        port: "8000",
        path: "/api/entidadesAll",
        headers: {
          "Content-Type": "application/json",
          "Content-Length": "0",
          Authorization:
            "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMmU0ZTBkYzBmYWU3OTU3MWU4NTRiYmQxYjAzZjk5YWY3OGU4MDA3MjUwZmEwZjFjZTFlYWQ5Yzc1MDQxMTQxMTZjMDYxMjM5NTk3ZDhkMWQiLCJpYXQiOjE2MjM4NjY3MzguMzM2OTg5LCJuYmYiOjE2MjM4NjY3MzguMzM3LCJleHAiOjE2NTU0MDI3MzguMzI0MzIxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.eTNghTPuUlqQheiYHACVYz7uDd-DLqmW1SVV0VDaoJzZkzeqpt8sIiuEX1PLB8zwh5lwZ7ih0Zu6p4-Xp-7c0Ku5stLNBVbQXVOJ6hVO6EZpK3qfe5yCNXbdyulKT3cpvdG3PW9ZjOwDVWi_lM5DPxTbnH5H2VxVbj7AsT4aI4WiCWd2c_ZGqa9OxZFPUlT7MdxkH_Mj0qgjANaiUs57YCIVgKvLc_cYZrAF636hpsz7IH3iltGyZZ7Kzdt4wRgyOBlYWfegoRz8KrGUyuFbX_31ktfsUjuibnI7REXj90YYprn5J4YgRflYK1vbpoCnUzMoLJrJtOPreRCbT5ioZepiIIA2yaqcz-QLqVBCUqpM6nSP-7MHHvEpMbVtPxOmRWwg0Oy8D00Cty_PnvIPFYsBGGPuaeMK94vrJ-rQMqG9QOoAq2RptaJUq9H081DnIxwVcuBvBiwOl8BBIeUtQsAR-oG1XPhHZ0aC7CoUn6e1HPfeXsmA3DKCu1SmYhhkQT2EDe1yCx49-_fqE2sO4Ouze6D34GXuDrYDevul-EcxZuugw9VfXeUvblDcRkKjxtwJdFcOCEfFP48yX3IuCAzFNRlloY6LFf5JwPIBmr_Vdzlnf85PzkV1yHyxTSdP_pUVQWOpOoBGltrw1HYP1f0zVsoa4_YB8rLwG5PArhw",
        },
      };

      const req = http.request(options, function (res) {
        const chunks = [];

        res.on("data", function (chunk) {
          chunks.push(chunk);
        });

        res.on("end", function () {
          const body = Buffer.concat(chunks);
          console.log(body);
        });
      });

      req.end();
    },
  },
};
</script>
