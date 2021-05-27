const initialState = {
  id: '',
  name: '',
  code: '',
  lastname: '',
  second_lastname: '',
  rfc: '',
  curp: '',
  email: '',
  birthdate: '',
  gender: '',
  education_level: '',
  marital_status: '',
  civilStatus: '',
  telephone: '',
  cellphone: '',
  nationality: '',
  nss: '',
  contact: {
    name: '',
    phone: ''
  },
  addresses: [
  ],
  jobs: [],
  achievements: [],
  skills: [],
  education: [],
  country: {
    name: '',
    id: ''
  },
  state: {
    name: '',
    id: ''
  },
  certifications: [],
  accounts: [],
  account: {
    cat_bank_id: '',
    cat_bank_account_type_id: '',
    clabe: '',
    account: ''
  },
  documents: [],
  employments: [],
  customValues: [],
}

export const updateEmployee = (state, value) => {
  console.log('employee to set', value)
  if (value.contact === null) {
    value.contact = { name: '', phone: '' }
  }
  state = Object.assign(state, value);
}

export const addExperience = (state, obj) => {
  state.jobs.push(obj)
}

export const addEducation = (state, obj) => {
  state.education.push(obj)
}

// eslint-disable-next-line no-unused-vars
export const reset = (state) => {
  state = Object.assign(state, initialState);
  state.employments = []
}

export const addCertification = (state, obj) => {
  state.certifications.push(obj)
}

export const addAddress = (state, obj) => {
  state.addresses.push(obj)
}

export const addEmployment = (state, obj) => {
  obj.has_kit = false // Setting initial value to false because cannot set on array object
  state.employments.push(obj)
}

export const addAccount = (state, obj) => {
  state.accounts.push(obj)
}

export const updateDocuments = (state, documents) => {
  // entering uipdate
  console.log('entering documents', documents)
  state.documents = documents
}

export const setCustomValues = (state, field) => {
  state.customValues = field
}
