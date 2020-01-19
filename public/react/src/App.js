if(localStorage.key) {
    let key = localStorage.getItem("key");
    if(key != '2020compositefest.com') 
        location.href="/"
}
const Input = ({ event_name, event_control, onEventControl, participant_number
    , onInputChange, inputValue, error, displayName = false
}) => {
    const sendFalse = () => {
        event_control && onEventControl(false, event_name)
    }
    const sendTrue = () => {
        !event_control && onEventControl(true, event_name)
    }
    const onChange = (e) => {
        onInputChange(e.target.name, e.target.value, event_name)
    }
    return (
        <div className="row mt-1">
            <div className="col-md-12 m-auto">
                <div className="form-group row">
                    <label className="col-md-3 label-control text-uppercase">{displayName ? displayName : event_name}</label>
                    <div className="col-md-7">

                        {participant_number.map((val, i) => {
                            return (
                                <input type="text"
                                    className={"form-control mb-1 " + (error && "is-invalid")} disabled={!event_control}
                                    placeholder="Participant Name" name={val}
                                    onChange={onChange} value={inputValue[val]} key={i}

                                />
                            )
                        })}
                        {error && <span className="text-danger"><i className="ft-alert-octagon"></i>  {error}</span>}
                    </div>
                    <div className="col-md-2" >
                        <a className={"btn border-lite " + (!event_control ? "btn-danger text-white" : "btn-default")}
                            onClick={sendFalse} 
                        >No</a>
                        <a className={"btn border-lite " + (event_control ? "btn-success text-white" : "btn-default")}
                            onClick={sendTrue} 
                        >Yes</a>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    )
} 

class App extends React.Component {
    state = {
        step: 1,
        done: false,
        showData: false,
        events: {
            it_manager: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            vlog: {
                participating: false,
                names: {
                    name1: '', 
                },
                error: false
            },
            paper_presentation: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            web_design: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            coding: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            it_quiz: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            treasure_hunt: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            gaming: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            video_editing: {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            },
            photography: {
                participating: false,
                names: {
                    name1: ''
                },
                error: false
            },
            mad_ad: {
                participating: false,
                names: {
                    name1: '',
                    name2: '',
                    name3: '',
                    name4: '',
                    name5: ''
                },
                error: false
            },
            ice_breaker : {
                participating: false,
                names: {
                    name1: '',
                    name2: ''
                },
                error: false
            }
        },
        college: {
            name: '',
            error: false
        },
        uniqueList: [],
        count: [],
        cosplay: {
            participating: false,
            error: {
                number: false,
                msg: false
            },
            names: [''],
            count: 1
        },
        exhibition: {
            participating: false,
            error: {
                number: false,
                msg: false
            },
            names: [''],
            count: 1
        },
    } 
    getState = () => {
        if(localStorage.state) {
            let state = localStorage.getItem('state');
            state = JSON.parse(state);
            this.setState({...state});
        }
    }
    saveState = () => {
        localStorage.setItem('state',JSON.stringify(this.state))
    }
    handleCount = (val = false) => {
        let count = [];
        let events = this.state.events;
        Object.keys(events).forEach(event => {
            if(events[event].participating) {
                Object.keys(events[event].names).forEach(name => {
                    count.push(events[event].names[name]);
                    count = count.filter((name) => name != '');
                });
            }
        }); 
        this.setState({count});
    }
    gotoStep = (step) => {
        if(this.state.step > step) {
            this.setState({step})
        }
    } 
    handleStepUpdate = () => {
        this.setState({ step: this.state.step + 1 })
    }
    onEventControl = (control, event_name) => {
        let events = this.state.events;
        events[event_name].participating = control;
        this.handleCount();
        this.setState({ events});
    }
    onInputHandle = (name, value, event_name) => {
        let events = this.state.events;
        events[event_name].names[name] = value;
        this.setState({ events });
    }
    handleFieldEmpty = (step_events) => {
        let events = this.state.events;
        let validated = true;
        step_events.forEach(event => {
            if (events[event].participating) {
                Object.keys(events[event].names).forEach(name => {
                    if (events[event].names[name] == '') {
                        events[event].error = `${event} name field cannot be empty. if your not participating then click NO button`
                        validated = false;
                    } else {
                        events[event].error = false;
                    }
                })
            } else {
                events[event].error = false;
            }
        })
        this.setState({ events });
        return validated;
    }
    handleUniqueNames = (step_events) => { 
        let events = this.state.events;
        let uniqueList = [];
        let validated = true; 
        let dontPush = false;
        step_events.forEach(event => {
            if (events[event].participating) {
                Object.keys(events[event].names).map(name => {
                    if (events[event].names[name] != '') {
                        dontPush = false;
                        uniqueList.forEach(val => { 
                            if(val.name == events[event].names[name]) {
                                validated = false; 
                                if (val.event == event) {
                                    events[event].error = `${val.event} should have two diffrent names. if both the participant's names are same then diffrentiate then with surnames`
                                } else {
                                    events[event].error = `${events[event].names[name]} is already participating in ${val.event}. he cannot participate in ${event}`;
                                }
                            }
                        })
                        uniqueList.push({
                            name: events[event].names[name],
                            event
                        })
                    }
                })
            }
        })
        this.setState({ events, uniqueList });
        return validated;
    }
    handleValidation1 = () => {
        let college = this.state.college;
        if (college.name == '')
            college.error = 'College Name Field cannot be empty'
        else
            this.setState({ step: 2 })
        this.setState({ college });
    }
    handleValidation2 = () => {
        let step_events = ['it_manager', 'paper_presentation', 'treasure_hunt', 'web_design'];
        this.handleCount();
        let valid1 = this.handleFieldEmpty(step_events);
        let valid2 = this.handleUniqueNames(step_events);

        if (valid1 && valid2)
            this.setState({ step: 3 });
    }
    handleValidation3 = () => {
        let step_events = ['it_manager', 'paper_presentation', 'treasure_hunt', 'web_design',
            'coding','gaming', 'photography', 'video_editing'];
        let valid1 = this.handleFieldEmpty(step_events);
        let valid2 = this.handleUniqueNames(step_events);

        if (valid1 && valid2)
            this.setState({ step: 4 });
    }
    handleValidation4 = async () => {
        let step_events = ['it_manager', 'paper_presentation', 'treasure_hunt', 'web_design',
            'coding', 'gaming', 'photography', 'video_editing', 'it_quiz','vlog'];
        this.handleCount(true);
        let valid1 = this.handleFieldEmpty(step_events);  
        let mad_ad = this.handleFieldEmpty(['mad_ad']);
        let valid3 = this.handleUniqueNames(step_events);
        let valid5 = false;
        if(mad_ad) { 
            valid5 = await this.validateMadAdEvent();
        }  
 

        if(valid1 && mad_ad  && valid3 && valid5) {
            this.setState({step: 5});
        }
    }
    handleValidation5 = async () => {
        let {cosplay,exhibition} = this.state;
        cosplay.error.msg = false;
        exhibition.error.msg = false;
        this.handleCount(); 
        let validated = true;
        let valid4 = true;
        let ice_breaker = this.handleFieldEmpty(['ice_breaker']);
        if(ice_breaker) {
            valid4 = await this.validateIceBreakerEvent();
        }
        cosplay.participating && cosplay.names.forEach((name, i) => {
            if(name == '') {
                cosplay.error.msg = `Fields are empty . Please provide a valid Name`;
                validated = false;
            } 
        }) 
        exhibition.participating && exhibition.names.forEach((name, i) => {
            if(name == '') {
                exhibition.error.msg = `Fields are empty . Please provide a valid Name`;
                validated = false;
            } 
        })
        this.setState({cosplay});
        if(validated && valid4) {
            this.handleSubmit();
        }
        
    }
    validateMadAdEvent = async () => {
        let validated = true;
        if(this.state.events.mad_ad.participating) {
            await this.handleCount();
            let count = this.state.count;
            let uniqueList = this.state.uniqueList;
            let events = this.state.events;
            let {name1,name2,name3,name4,name5} = this.state.events.mad_ad.names;
            let nameList = [false,false,false,false,false];
            let names = [name1,name2,name3,name4,name5];
            uniqueList.forEach(unique => {
                Object.keys(events.mad_ad.names).forEach((name, i) => { 
                    if(events.mad_ad.names[name] == unique.name) { 
                        if(unique.event != 'video_editing' && unique.event != 'it_quiz' && unique.event != 'coding' && unique.event != 'gaming') {
                            events.mad_ad.error = `${events.mad_ad.names[name]} is already participating in ${unique.event} he cannot participate in Mad Ad. IT Quiz , Coding, Video Editing & Gaming participant's can participate in Mad Ad Event`;
                            validated = false;
                        } 
                        count = [...new Set(count)]; 
                        nameList[i] = true; 
                    }
                })
            });
            let newNameCount = [];
            nameList.forEach((val, i) => {
                if(!val) {
                    newNameCount.push(i)
                }
            }); 
            if(count.length + newNameCount.length > 15 && validated) {
                events.mad_ad.error = `The Limit of participant's is 15. "${newNameCount.map(val => names[val] + ", ")} cannot participate.  IT Quiz , Coding, Video Editing participant's can participate in Mad Ad Event`;
                validated = false;
            }
            this.setState({events,count});
        }
        return validated;   
    }
    validateIceBreakerEvent = async () => {
        let validated = true;
        if(this.state.events.ice_breaker.participating) {
            await this.handleCount();
            let count = this.state.count;
            let uniqueList = this.state.uniqueList;
            let events = this.state.events;
            let {name1,name2} = this.state.events.ice_breaker.names;
            let nameList = [false,false];
            let names = [name1,name2];
            uniqueList.forEach(unique => {
                Object.keys(events.ice_breaker.names).forEach((name, i) => { 
                    if(events.ice_breaker.names[name] == unique.name) { 
                        if(unique.event != 'coding' && unique.event != 'gaming' && unique.event != 'it_quiz' && unique.event != 'video_editing') {
                            events.ice_breaker.error = `${events.ice_breaker.names[name]} is already participating in ${unique.event} he cannot participate in Ice Breaker. IT Quiz , Coding, Video Editing participant's can participate in Mad Ad Event`;
                            validated = false;
                        } 
                        count = [...new Set(count)]; 
                        nameList[i] = true; 
                    }
                })
            });
            let newNameCount = [];
            nameList.forEach((val, i) => {
                if(!val) {
                    newNameCount.push(i)
                }
            }); 
            if(count.length + newNameCount.length > 15 && validated) {
                events.ice_breaker.error = `The Limit of participant's is 15. "${newNameCount.map(val => names[val] + ", ")} cannot participate.  IT Quiz , Coding, Video Editing participant's can participate in Mad Ad Event`;
                validated = false;
            }
            this.setState({events,count});
        }
        return validated;   
    } 
    handleSubmit = () => {
        let state = this.state;
        let data = {
            college: '',
            events: {

            }
        }
        data.college = state.college.name;
        Object.keys(state.events).forEach(val => {
            if (state.events[val].participating) {
                data.events[val] = {};
                name = '';
                Object.keys(state.events[val].names).forEach(value => {
                    name += "#" + state.events[val].names[value] + " ";
                })
                data.events[val].name = name;
            }
        });
        if(this.state.cosplay.participating) {
            data.events.cosplay = {};
            data.events.cosplay.name = this.state.cosplay.names.join("# ");
        }
        if(this.state.exhibition.participating) {
            data.events.exhibition = {};
            data.events.exhibition.name = this.state.exhibition.names.join("# ");
        } 
        axios.post('/registration', data)
            .then((res) => { 
                this.setState({ done: res.data })
            })
            .catch(err => console.log(err.message));
    } 
    render() {
        let events = this.state.events;
        let step = this.state.step;
        let college = this.state.college;
        let cosplay = this.state.cosplay; 
        let exhibition = this.state.exhibition;
        return (
            <div className="">
                {this.state.done
                    ?
                    <div className="bg-dark">
                        <div className="card card-container d-flex box-shadow-4">
                            <i className="ft ft-check font-adjust text-success"></i>
                            <h6 className="text-uppercase font"><b>Your Team Name: </b>{this.state.done}</h6>
                            <button class="btn btn-success" onClick={() => {
                                window.location.reload();
                            }}>Done</button>
                        </div>
                    </div>
                    :
                    <div className="card">
                        <div className="card-header box-shadow-1" style={{ position: 'fixed', backgroundColor: '#fff', zIndex: '10' }}>
                            <div className="d-flex" style={{ justifyContent: 'space-around', alignItems: 'center', width: '100vw' }}>
                                <h2 className="card-title">College Registration for Composite 2020</h2>
                                <h2 className="card-title">Participant Count:<span className="number">{this.state.count.length}</span></h2>
                            </div>
                        </div>
                        
                        <div className="container flex-h py-2" style={{ marginTop: '80px' }} >
                            <div className="flex1 step-parent" id="1" onClick={() => {
                                this.gotoStep(1);
                            }}>
                                <span className="step active">1</span>
                                <span className="mt-1">Step 1</span>
                            </div>

                            <div className={"flex3 line " + (this.state.step > 1 && "line-active")}></div>
                            <div className={"flex1 step-parent"} id="2" onClick={() => {
                                this.gotoStep(2);
                            }}>
                                <span className={"step " + (this.state.step > 1 ? "active" : "new")}>2</span>
                                <span className="mt-1">Step 2</span>
                            </div>

                            <div className={"flex3 line " + (this.state.step > 2 && "line-active")}></div>
                            <div className="flex1 step-parent" id="3" onClick={() => {
                                this.gotoStep(3);
                            }} >
                                <span className={"step  " + (this.state.step > 2 ? "active" : "new")}>3</span>
                                <span className="mt-1">Step 3</span>
                            </div>

                            <div className={"flex3 line " + (this.state.step > 3 && "line-active")}></div>
                            <div className="flex1 step-parent" id="4" onClick={() => {
                                this.gotoStep(4);
                            }}>
                                <span className={"step  " + (this.state.step > 3 ? "active" : "new")}>4</span>
                                <span className="mt-1">Step 4</span>
                            </div>
                            <div className={"flex3 line " + (this.state.step > 4 && "line-active")}></div>
                            <div className="flex1 step-parent" id="5" onClick={() => {
                                this.gotoStep(5);
                            }}>
                                <span className={"step  " + (this.state.step > 5 ? "active" : "new")}>5</span>
                                <span className="mt-1">Step 5</span>
                            </div>
                        </div>
                        <hr />
                        <div class="d-flex container-fluid m-auto" style={{ justifyContent: 'space-between' }}>
                            <div className="border-right-edit py-1" style={{ width: '28%' }}>
                                {this.state.college.name != '' && <h5>College Name: {college.name}</h5>}
                                <hr />
                                {Object.keys(events).map(event => {
                                    if (events[event].participating && !event.error) {
                                        return (
                                            <div>
                                                <h6 className="text-uppercase p-0">{event}</h6>
                                                <div className="flex-h flex-wrap ml-2">
                                                    {Object.keys(events[event].names).map(name => {
                                                        if (events[event].names[name] != '') {
                                                            return (
                                                                <span className="mr-1"><i className="ft-chevrons-right icon-person"></i>
                                                                    {events[event].names[name]}
                                                                </span>
                                                            )
                                                        } else {
                                                            return (
                                                                <div style={{ display: 'none' }}></div>
                                                            )
                                                        }
                                                    })}
                                                </div>
                                                <hr />
                                            </div>
                                        )
                                    } else {
                                        return (
                                            <div style={{ display: 'none' }}></div>
                                        )
                                    }
                                })}
                            </div>
                            <div className="p-0" style={{ width: '71%' }}>
                                {this.state.step == 1 && <div className="m-auto pt-2">
                                    <div className="form-group row">
                                        <label className="col-md-3 label-control">Enter Your College Name</label>
                                        <div className="col-md-7">
                                            <input type="text"
                                                className="form-control"
                                                placeholder="Enter Your College Name"
                                                onChange={(e) => {
                                                    let college = this.state.college;
                                                    college.name = e.target.value;
                                                    this.setState({ college: college })
                                                }}
                                                value={this.state.college.name}
                                            />
                                            {this.state.college.error && <span className="text-danger"><i className="ft-alert-octagon"></i>  {this.state.college.error}</span>}
                                        </div>
                                    </div>
                                    <hr />

                                    <div className="flex-h flex-end p-1">
                                        <button className="btn btn-primary btn-no-radius" onClick={this.handleValidation1}>Submit</button>
                                    </div>
                                </div>}

                                {this.state.step == 2 &&
                                    <div className="">
                                        <Input event_name={"it_manager"} event_control={events.it_manager.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1']}
                                            onInputChange={this.onInputHandle} inputValue={events.it_manager.names}
                                            error={events.it_manager.error}
                                        />

                                        <Input event_name={"paper_presentation"} event_control={events.paper_presentation.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1']}
                                            onInputChange={this.onInputHandle} inputValue={events.paper_presentation.names}
                                            error={events.paper_presentation.error}
                                        />

                                        <Input event_name={"treasure_hunt"} event_control={events.treasure_hunt.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                            onInputChange={this.onInputHandle} inputValue={events.treasure_hunt.names}
                                            error={events.treasure_hunt.error}
                                        />

                                        <Input event_name={"web_design"} event_control={events.web_design.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1']}
                                            onInputChange={this.onInputHandle} inputValue={events.web_design.names}
                                            error={events.web_design.error}
                                        />
                                        <hr />

                                        <div className="flex-h flex-end p-1">
                                            <button className="btn btn-primary btn-no-radius" onClick={this.handleValidation2}>Submit</button>
                                        </div>
                                    </div>}

                                {step == 3 &&
                                    <div className="">
                                        <Input event_name={"coding"} event_control={events.coding.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                            onInputChange={this.onInputHandle} inputValue={events.coding.names}
                                            error={events.coding.error}
                                        />

                                        <Input event_name={"gaming"} event_control={events.gaming.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                            onInputChange={this.onInputHandle} inputValue={events.gaming.names}
                                            error={events.gaming.error}
                                        />

                                        <Input event_name={"photography"} event_control={events.photography.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1']}
                                            onInputChange={this.onInputHandle} inputValue={events.photography.names}
                                            error={events.photography.error} displayName="PhotoGraphy and MEME"
                                        />

                                        <Input event_name={"video_editing"} event_control={events.video_editing.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                            onInputChange={this.onInputHandle} inputValue={events.video_editing.names}
                                            error={events.video_editing.error}
                                        />

                                        <hr />

                                        <div className="flex-h flex-end p-1">
                                            <button className="btn btn-primary btn-no-radius" onClick={this.handleValidation3}>Submit</button>
                                        </div>
                                    </div>
                                }

                                {step == 4 &&
                                    <div className="">
                                        <Input event_name={"it_quiz"} event_control={events.it_quiz.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                            onInputChange={this.onInputHandle} inputValue={events.it_quiz.names}
                                            error={events.it_quiz.error}
                                        />

                                        <Input event_name={"vlog"} event_control={events.vlog.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1']}
                                            onInputChange={this.onInputHandle} inputValue={events.vlog.names}
                                            error={events.vlog.error}
                                        />

                                        <Input event_name={"mad_ad"} event_control={events.mad_ad.participating}
                                            onEventControl={this.onEventControl} participant_number={['name1', 'name2', 'name3', 'name4', 'name5']}
                                            onInputChange={this.onInputHandle} inputValue={events.mad_ad.names}
                                            error={events.mad_ad.error}
                                        />
                                        <hr />

                                        <div className="flex-h flex-end p-1">
                                            <button className="btn btn-primary btn-no-radius" onClick={this.handleValidation4}>Submit</button>
                                        </div>
                                    </div>
                                }

                                {step == 5 &&
                                    <div className="row mt-1">
                                        <div className="col-md-12 m-auto">
                                            <Input event_name={"ice_breaker"} event_control={events.ice_breaker.participating}
                                                onEventControl={this.onEventControl} participant_number={['name1', 'name2']}
                                                onInputChange={this.onInputHandle} inputValue={events.ice_breaker.names}
                                                error={events.ice_breaker.error}
                                            />
                                            <div className="form-group row">
                                                <label className="col-md-2 label-control text-uppercase">COSPLAY</label>
                                                <div className="col-md-7">

                                                    {cosplay.names.map((val, i) => {
                                                        return (
                                                            <div className="row" style={{ alignItems: 'center' }}>
                                                                <input type="text"
                                                                    className={"form-control mb-1 col-md-10 "}
                                                                    disabled={!cosplay.participating}
                                                                    placeholder="Participant Name" name={val}
                                                                    onChange={(e) => {
                                                                        let cosplay = this.state.cosplay;
                                                                        cosplay.names[i] = e.target.value;
                                                                        this.setState({ cosplay });
                                                                    }} value={val} key={i}

                                                                />
                                                                <i className="ft-x col-md-1 font-icon mb-1" onClick={() => {
                                                                    let cosplay = this.state.cosplay;
                                                                    if (cosplay.count > 1) {
                                                                        cosplay.names.splice(i, 1);
                                                                        cosplay.count = cosplay.count - 1; 
                                                                        cosplay.error.msg = false;
                                                                        this.setState({ cosplay });
                                                                    } else {
                                                                        cosplay.error.msg = "Atleast there should be 1 participant for cosplay"
                                                                    }
                                                                }}></i>
                                                            </div>
                                                        )
                                                    })}
                                                    {cosplay.error.msg && <span className="text-danger"><i className="ft-alert-octagon"></i>  {cosplay.error.msg}</span>}
                                                </div>
                                                <div className="col-md-2 p-0" >
                                                    <a className={"btn border-lite " + (!cosplay.participating ? "btn-danger text-white" : "btn-default")}
                                                        onClick={() => {
                                                            let cosplay = this.state.cosplay;
                                                            cosplay.participating = false;
                                                            this.setState({ cosplay });
                                                        }}
                                                    >No</a>
                                                    <a className={"btn border-lite " + (cosplay.participating ? "btn-success text-white" : "btn-default")}
                                                        onClick={() => {
                                                            let cosplay = this.state.cosplay;
                                                            cosplay.participating = true;
                                                            this.setState({ cosplay });
                                                        }}
                                                    >Yes</a>
                                                </div>
                                                <div className="col-md-1 p-0">
                                                    <button className="btn btn-primary" disabled={!cosplay.participating}
                                                        onClick={() => {
                                                            let cosplay = this.state.cosplay;
                                                            if (cosplay.count < 6) {
                                                                cosplay.count = cosplay.count + 1;
                                                                cosplay.names.push(''); 
                                                                cosplay.error.msg = false;
                                                                this.setState({ cosplay });
                                                            } else {
                                                                cosplay.error.msg = 'The maximum number of of participant for cosplay is 6';
                                                                this.setState({ cosplay });
                                                            }
                                                        }}
                                                    ><i className="ft-plus"></i> </button>
                                                </div>
                                            </div>
                                            <hr />
                                            <div className="form-group row">
                                                <label className="col-md-2 label-control text-uppercase">Exhibition</label>
                                                <div className="col-md-7">

                                                    {exhibition.names.map((val, i) => {
                                                        return (
                                                            <div className="row" style={{ alignItems: 'center' }}>
                                                                <input type="text"
                                                                    className={"form-control mb-1 col-md-10 "}
                                                                    disabled={!exhibition.participating}
                                                                    placeholder="Participant Name" name={val}
                                                                    onChange={(e) => {
                                                                        let exhibition = this.state.exhibition;
                                                                        exhibition.names[i] = e.target.value;
                                                                        this.setState({ exhibition });
                                                                    }} value={val} key={i}

                                                                />
                                                                <i className="ft-x col-md-1 font-icon mb-1" onClick={() => {
                                                                    let exhibition = this.state.exhibition;
                                                                    if (exhibition.count > 1) {
                                                                        exhibition.names.splice(i, 1);
                                                                        exhibition.count = exhibition.count - 1; 
                                                                        exhibition.error.msg = false;
                                                                        this.setState({ exhibition });
                                                                    } else {
                                                                        exhibition.error.msg = "Atleast there should be 1 participant for exhibition. if your not participating then Press No button"
                                                                    }
                                                                }}></i>
                                                            </div>
                                                        )
                                                    })}
                                                    {exhibition.error.msg && <span className="text-danger"><i className="ft-alert-octagon"></i>  {exhibition.error.msg}</span>}
                                                </div>
                                                <div className="col-md-2 p-0" >
                                                    <a className={"btn border-lite " + (!exhibition.participating ? "btn-danger text-white" : "btn-default")}
                                                        onClick={() => {
                                                            let exhibition = this.state.exhibition;
                                                            exhibition.participating = false;
                                                            this.setState({ exhibition });
                                                        }}
                                                    >No</a>
                                                    <a className={"btn border-lite " + (exhibition.participating ? "btn-success text-white" : "btn-default")}
                                                        onClick={() => {
                                                            let exhibition = this.state.exhibition;
                                                            exhibition.participating = true;
                                                            this.setState({ exhibition });
                                                        }}
                                                    >Yes</a>
                                                </div>
                                                <div className="col-md-1 p-0">
                                                    <button className="btn btn-primary" disabled={!exhibition.participating}
                                                        onClick={() => {
                                                            let exhibition = this.state.exhibition;
                                                            if (exhibition.count < 2) {
                                                                exhibition.count = exhibition.count + 1;
                                                                exhibition.names.push(''); 
                                                                exhibition.error.msg = false;
                                                                this.setState({ exhibition });
                                                            } else {
                                                                exhibition.error.msg = 'The maximum number of of participant for exhibition is 2';
                                                                this.setState({ exhibition });
                                                            }
                                                        }}
                                                    ><i className="ft-plus"></i> </button>
                                                </div>
                                            </div>
                                            <div className="flex-h flex-end p-1">
                                                <button className="btn btn-primary btn-no-radius" 
                                                    onClick={this.handleValidation5}>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                }
                            </div>

                            </div>  

                        {localStorage.dev && 
                        <div>
                            <button onClick={this.saveState} className="btn btn-primary">Save</button>
                            <button onClick={this.getState} className="btn btn-info">get</button>
                        </div>}
                    </div>
                }
            </div>
        )
    }
}
const domContainer = document.querySelector('#root');
ReactDOM.render(React.createElement(App), domContainer);


