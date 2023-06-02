import {usePiniaStore} from "./index";
import state from "./state";

export default {
    async loadAllDivision(){
        const url = `${baseURL}/utility/get-all-division`
        const response = await axios.get(url)

        const store = this.store()
        store.$patch(state => {
            state.divisions = response.data
        })

    },

    async loadAllBranches(){
        const url = `${baseURL}/utility/get-all-branch`
        const response = await axios.get(url)

        const store = this.store()
        store.$patch(state => {
            state.branches = response.data
        })

    },

    async getDistrictForDivision(payload){
        const store = this.store()
        const url = `${baseURL}/utility/get-district-for-division`
        const response = await axios.post(url, payload)

        store.$patch(state => {
            if (payload.from === 'permanent'){
                state.permanentDistricts = response.data
            }else {
                state.districts = response.data
            }
        })

    },

    async getAreaForBranch(payload){
        const store = this.store()
        const url = `${baseURL}/utility/get-area-for-branch`
        const response = await axios.post(url, payload)

        store.$patch(state => {
            state.areas = response.data
        })

    },

    async getAreaForUserBranch(){
        const store = this.store()
        const url = `${baseURL}/utility/get-area-for-user-branch`
        const response = await axios.get(url)

        store.$patch(state => {
            state.areas = response.data
        })

    },

    async getUpazilaForDistrict(payload){
        const url = `${baseURL}/utility/get-upazila-for-district`
        const response = await axios.post(url, payload)

        const store = this.store()
        store.$patch(state => {
            if (payload.from === 'permanent'){
                state.permanentUpazilas = response.data
            }else {
                state.upazilas = response.data
            }
        })

    },

    store() {
        return usePiniaStore()
    }
}
