const ReactCSSTransitionGroup = React.addons.CSSTransitionGroup;

class Calendar extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      selectedMonth: moment(),
      selectedDay: moment().startOf("day"),
      selectedMonthEvents: [],
      showEvents: false };


    this.previous = this.previous.bind(this);
    this.next = this.next.bind(this);
    this.addEvent = this.addEvent.bind(this);
    this.showCalendar = this.showCalendar.bind(this);
    this.goToCurrentMonthView = this.goToCurrentMonthView.bind(this);

    this.initialiseEvents();
  }

  previous() {
    const currentMonthView = this.state.selectedMonth;

    this.setState({
      selectedMonth: currentMonthView.subtract(1, "month") });

  }

  next() {
    const currentMonthView = this.state.selectedMonth;
    this.setState({
      selectedMonth: currentMonthView.add(1, "month") });

  }

  select(day) {
    this.setState({
      selectedMonth: day.date,
      selectedDay: day.date.clone(),
      showEvents: true });

  }

  goToCurrentMonthView() {
    const currentMonthView = this.state.selectedMonth;
    this.setState({
      selectedMonth: moment() });

  }

  showCalendar() {
    this.setState({
      selectedMonth: this.state.selectedMonth,
      selectedDay: this.state.selectedDay,
      showEvents: false });

  }



  renderMonthLabel() {
    const currentMonthView = this.state.selectedMonth;
    return (
      React.createElement("span", { className: "box month-label" },
      currentMonthView.format("MMMM YYYY")));


  }

     renderMonthLabel() {
    const currentSelectedDay = this.state.selectedDay;
    return (
      React.createElement("span", { className: "box month-label", onClick: this.goToCurrentMonthView }, "Outubro 2020"));



  }

  renderDayLabel() {
    const currentSelectedDay = this.state.selectedDay;
    return (
      React.createElement("span", { className: "box month-label" },
      currentSelectedDay.format("DD MMMM YYYY")));


  }

  renderTodayLabel() {
    const currentSelectedDay = this.state.selectedDay;
    return (
      React.createElement("span", { className: "box today-label", onClick: this.goToCurrentMonthView }, "Hoje"));



  }

  renderWeeks() {
    const currentMonthView = this.state.selectedMonth;
    const currentSelectedDay = this.state.selectedDay;
    const monthEvents = this.state.selectedMonthEvents;

    let weeks = [];
    let done = false;
    let previousCurrentNextView = currentMonthView.
    clone().
    startOf("month").
    subtract(1, "d").
    day("Monday");
    let count = 0;
    let monthIndex = previousCurrentNextView.month();

    while (!done) {
      weeks.push(
      React.createElement(Week, {
        previousCurrentNextView: previousCurrentNextView.clone(),
        currentMonthView: currentMonthView,
        monthEvents: monthEvents,
        selected: currentSelectedDay,
        select: day => this.select(day) }));


      previousCurrentNextView.add(1, "w");
      done = count++ > 2 && monthIndex !== previousCurrentNextView.month();
      monthIndex = previousCurrentNextView.month();
    }
    return weeks;
  }

  handleAdd() {
    const monthEvents = this.state.selectedMonthEvents;
    const currentSelectedDate = this.state.selectedDay;

    let newEvents = [];

    var eventTitle = prompt("Qual o tipo de treino? (Corrida, Alongamento, Artes Marciais) ");

    switch (eventTitle) {
      case "":
        alert("Este campo não pode estar vazio");
        break;
      case null:
        alert("Ok adicione em outro dia!");
        break;
      default:
        var newEvent = {
          title: eventTitle,
          date: currentSelectedDate,
          dynamic: true };


        newEvents.push(newEvent);

        for (var i = 0; i < newEvents.length; i++) {
          monthEvents.push(newEvents[i]);
        }

        this.setState({
          selectedMonthEvents: monthEvents });

        break;}

  }

  addEvent() {
    const currentSelectedDate = this.state.selectedDay;
    let isAfterDay = moment().startOf("day").subtract(1, "d");

    if (currentSelectedDate.isAfter(isAfterDay)) {
      this.handleAdd();
    } else {
      if (confirm("Você treinou neste dia ? (Clique em OK se sim)")) {
        this.handleAdd();
      } else {
      } 
    } 
  }

  removeEvent(i) {
    const monthEvents = this.state.selectedMonthEvents.slice();
    const currentSelectedDate = this.state.selectedDay;

    if (confirm("Você tem certeza que quer remover este treino ?")) {
      let index = i;

      if (index != -1) {
        monthEvents.splice(index, 1);
      } else {
        alert("Sem eventos pare remover neste dia!");
      }

      this.setState({
        selectedMonthEvents: monthEvents });

    }
  }

  initialiseEvents() {
    const monthEvents = this.state.selectedMonthEvents;

    let allEvents = [];

    var event1 = {
      title:
      "Press the Add button and enter a name for your event. P.S you can delete me by pressing me!",
      date: moment(),
      dynamic: false };


    var event2 = {
      title: "Event 2 - Meeting",
      date: moment().startOf("day").subtract(2, "d").add(2, "h"),
      dynamic: false };


    var event3 = {
      title: "Event 3 - Cinema",
      date: moment().startOf("day").subtract(7, "d").add(18, "h"),
      dynamic: false };


    var event4 = {
      title: "Event 4 - Theater",
      date: moment().startOf("day").subtract(16, "d").add(20, "h"),
      dynamic: false };


    var event5 = {
      title: "Event 5 - Drinks",
      date: moment().startOf("day").subtract(2, "d").add(12, "h"),
      dynamic: false };


    var event6 = {
      title: "Event 6 - Diving",
      date: moment().startOf("day").subtract(2, "d").add(13, "h"),
      dynamic: false };


    var event7 = {
      title: "Event 7 - Tennis",
      date: moment().startOf("day").subtract(2, "d").add(14, "h"),
      dynamic: false };


    var event8 = {
      title: "Event 8 - Swimmming",
      date: moment().startOf("day").subtract(2, "d").add(17, "h"),
      dynamic: false };


    var event9 = {
      title: "Event 9 - Chilling",
      date: moment().startOf("day").subtract(2, "d").add(16, "h"),
      dynamic: false };


    var event10 = {
      title:
      "Hello World",
      date: moment().startOf("day").add(5, "h"),
      dynamic: false };


    allEvents.push(event1);
    allEvents.push(event2);
    allEvents.push(event3);
    allEvents.push(event4);
    allEvents.push(event5);
    allEvents.push(event6);
    allEvents.push(event7);
    allEvents.push(event8);
    allEvents.push(event9);
    allEvents.push(event10);

    for (var i = 0; i < allEvents.length; i++) {
      monthEvents.push(allEvents[i]);
    }

    this.setState({
      selectedMonthEvents: monthEvents });

  }

  render() {
    const currentMonthView = this.state.selectedMonth;
    const currentSelectedDay = this.state.selectedDay;
    const showEvents = this.state.showEvents;

    if (showEvents) {
      return (
        React.createElement("section", { className: "main-calendar" },
        React.createElement("header", { className: "calendar-header" },
        React.createElement("div", { className: "row title-header" },
        this.renderDayLabel()),

        React.createElement("div", { className: "row button-container" },
        React.createElement("i", {
          className: "box arrow fa fa-angle-left",
          onClick: this.showCalendar }),

        React.createElement("i", {
          className: "box event-button fa fa-plus-square",
          onClick: this.addEvent }))),



        React.createElement(Events, {
          selectedMonth: this.state.selectedMonth,
          selectedDay: this.state.selectedDay,
          selectedMonthEvents: this.state.selectedMonthEvents,
          removeEvent: i => this.removeEvent(i) })));



    } else {
      return (
        React.createElement("section", { className: "main-calendar" },
        React.createElement("header", { className: "calendar-header" },
        React.createElement("div", { className: "row title-header" },
        React.createElement("i", {
          className: "box arrow fa fa-angle-left",
          onClick: this.previous }),

        React.createElement("div", { className: "box header-text" },
        this.renderTodayLabel(),
        this.renderMonthLabel()),

        React.createElement("i", { className: "box arrow fa fa-angle-right", onClick: this.next })),

        React.createElement(DayNames, null)),

        React.createElement("div", { className: "days-container" },
        this.renderWeeks())));



    }
  }}


class Events extends React.Component {
  render() {
    const currentMonthView = this.props.selectedMonth;
    const currentSelectedDay = this.props.selectedDay;
    const monthEvents = this.props.selectedMonthEvents;
    const removeEvent = this.props.removeEvent;

    const monthEventsRendered = monthEvents.map((event, i) => {
      return (
        React.createElement("div", {
          key: event.title,
          className: "event-container",
          onClick: () => removeEvent(i) },

        React.createElement(ReactCSSTransitionGroup, {
          component: "div",
          className: "animated-time",
          transitionName: "time",
          transitionAppear: true,
          transitionAppearTimeout: 500,
          transitionEnterTimeout: 500,
          transitionLeaveTimeout: 500 },

        React.createElement("div", { className: "event-time event-attribute" },
        event.date.format("HH:mm"))),


        React.createElement(ReactCSSTransitionGroup, {
          component: "div",
          className: "animated-title",
          transitionName: "title",
          transitionAppear: true,
          transitionAppearTimeout: 500,
          transitionEnterTimeout: 500,
          transitionLeaveTimeout: 500 },

        React.createElement("div", { className: "event-title event-attribute" }, event.title))));


    });

    const dayEventsRendered = [];

    for (var i = 0; i < monthEventsRendered.length; i++) {
      if (monthEvents[i].date.isSame(currentSelectedDay, "day")) {
        dayEventsRendered.push(monthEventsRendered[i]);
      }
    }

    return (
      React.createElement("div", { className: "day-events" },
      dayEventsRendered));


  }}


class DayNames extends React.Component {
  render() {
    return (
      React.createElement("div", { className: "row days-header" },
      React.createElement("span", { className: "box day-name" }, "Seg"),
      React.createElement("span", { className: "box day-name" }, "Ter"),
      React.createElement("span", { className: "box day-name" }, "Qua"),
      React.createElement("span", { className: "box day-name" }, "Qui"),
      React.createElement("span", { className: "box day-name" }, "Sex"),
      React.createElement("span", { className: "box day-name" }, "Sab"),
      React.createElement("span", { className: "box day-name" }, "Dom")));


  }}


class Week extends React.Component {
  render() {
    let days = [];
    let date = this.props.previousCurrentNextView;
    let currentMonthView = this.props.currentMonthView;
    let selected = this.props.selected;
    let select = this.props.select;
    let monthEvents = this.props.monthEvents;

    for (var i = 0; i < 7; i++) {
      var dayHasEvents = false;

      for (var j = 0; j < monthEvents.length; j++) {
        if (monthEvents[j].date.isSame(date, "day")) {
          dayHasEvents = true;
        }
      }

      let day = {
        name: date.format("dd").substring(0, 1),
        number: date.date(),
        isCurrentMonth: date.month() === currentMonthView.month(),
        isToday: date.isSame(new Date(), "day"),
        date: date,
        hasEvents: dayHasEvents };


      days.push(React.createElement(Day, { day: day, selected: selected, select: select }));
      date = date.clone();
      date.add(1, "d");
    }
    return (
      React.createElement("div", { className: "row week" },
      days));


  }}


class Day extends React.Component {
  render() {
    let day = this.props.day;
    let selected = this.props.selected;
    let select = this.props.select;

    return (
      React.createElement("div", {
        className:
        "day" + (
        day.isToday ? " today" : "") + (
        day.isCurrentMonth ? "" : " different-month") + (
        day.date.isSame(selected) ? " selected" : "") + (
        day.hasEvents ? " has-events" : ""),

        onClick: () => select(day) },

      React.createElement("div", { className: "day-number" }, day.number)));


  }}


ReactDOM.render(React.createElement(Calendar, null), document.getElementById("calendar-content"));