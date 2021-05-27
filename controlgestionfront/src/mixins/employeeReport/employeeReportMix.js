import { downloadEmployeeReport } from 'src/services/EmployeeService'

export const employeeReportMix = {
  methods: {
    downloadReport(documentType, payloadItem = null,) {
      this.$q.loading.show();
      const payload = payloadItem == null ? this.filterData() : JSON.parse(payloadItem);
      payload.documentType = documentType;
      downloadEmployeeReport(payload).then((response) => {
        const blob = new Blob([response.data], {
          type: response.data.type
        })
        const linkUrl = window.URL.createObjectURL(blob)
        const link = document.createElement('a')
        link.href = linkUrl
        let title = documentType;
        if (documentType === 'excel') {
          title = 'reporte.xlsx';
        } else if (documentType === 'pdf') {
          title = 'Reporte.pdf';
        } else {
          title = 'Reporte.csv';
        }
        link.setAttribute('download', title)
        document.body.appendChild(link)
        link.click()

        this.$q.loading.hide();
      }).finally(() => {
        this.$q.loading.hide();
      });
    },
  },

}
