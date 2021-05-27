/*
export function someMutation (state) {
}
*/

export const updateConfig = (state, value) => {
  state = Object.assign(state, value);
}
