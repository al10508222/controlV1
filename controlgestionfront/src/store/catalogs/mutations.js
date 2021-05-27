/* Se combina el estado actual de los catalogs con los nuevos que se generan  */
export function setCatalogs(state, catalogs) {
  state = Object.assign(state, catalogs)
}
