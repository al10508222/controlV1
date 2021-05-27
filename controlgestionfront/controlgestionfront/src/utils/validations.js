export const curpValidate = (val, t) => {
  const CURP_REGEX = new RegExp('^([A-Z]{1}[AEIOUX]{1}[A-Z]{2})(((\\d{2})((0[1-9]|1[0-2])(0[1-9]|1\\d|2[0-8])|(0[13456789]|1[012])(29|30)|(0[13578]|1[02])31))|(([02468][048]|[13579][26])0229))([HM]{1})(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)([B-DF-HJ-NP-TV-Z]{3})([\\dA-Z]{1}[\\d]{1})$')
  return (v) => CURP_REGEX.test(v) || t
}
