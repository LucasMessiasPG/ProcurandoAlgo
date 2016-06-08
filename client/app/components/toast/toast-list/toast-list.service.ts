import {Injectable, EventEmitter} from "angular2/core";

@Injectable()
export class ToastService{
    private toast: Toast;
    public toast$: EventEmitter<Toast> = new EventEmitter();

    constructor() {
    }

    pop(toast){
        if(toast.message)
            this.toast = toast
        this.toast$.emit(toast)
    }

}

export interface Toast{
    message: String;
    type: String;
    timer: Number;
    title: String;
}