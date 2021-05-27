/* this plugin is to check if a user can render some module or function */
export default ({ store, Vue }) => {
  const Permissions = {
    install() {
      Vue.prototype.canShow = (permission) => {
        if (!permission) {
          throw new Error('The permission is required as a parameter to the function');
        }
        return store.state.user.information.permissions.includes(permission)
      }

      Vue.prototype.canShowAny = (permissions) => {
        if (!permissions || !Array.isArray(permissions)) {
          throw new Error('The permission is required as a parameter to the function')
        }
        return permissions.some((permission) => store.state.user.information.permissions.includes(permission))
      }
    },
  }
  Vue.use(Permissions);
}
