import * as CatlogService from 'src/services/admin/CatalogService';

export function setCatalogs(context, payload) {
  CatlogService.index(payload).then((catalogs) => {
    context.commit('setCatalogs', catalogs)
  }).catch((err) => {
    alert(err)
  })
}
