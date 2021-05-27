/**
 *  func to receive cents from back and return the value in pesos
 *  @param int
 *  @return int
 * */
export const centsToPesos = (value) => parseFloat(value / 100).toFixed(2);
