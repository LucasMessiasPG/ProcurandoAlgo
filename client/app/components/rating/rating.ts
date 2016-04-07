import {Component} from "angular2/core";
import {Input} from "angular2/core";
import {StarCompoent} from "./stars";
@Component({
    selector: 'rating',
    templateUrl: '../app/components/rating/rating.html',
    directives:[StarCompoent]
})

export class RateComponent{
    private stars = []

    @Input('rate') set rate(stars) {
        this.stars = stars[0];
    }

    setRate(t){
        console.log(t)
    }
}