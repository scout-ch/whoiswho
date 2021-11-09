class NodesController {

  leadRoleName = "Leiter*in";
  leadRoleMetaInfo = "Präsidium";

  designGroup(result, root_name, root_meta, root_img) {

    let people = result.people;
    let lead_roles = this.findLeadRoles(result.linked.roles);
    let people_new = [];

    people_new.push({
      id: 1,
      Name: root_name,
      Meta: root_meta,
      img_url: root_img
    });

    for(const i in people) {
      if(typeof people[i] === 'undefined' || typeof people[i].links === 'undefined') {
        continue;
      }
      
      let person = {
        id: parseInt(i) + parseInt(2),
        pid: 1,
        Name: people[i].first_name + " " + people[i].last_name + " / " + people[i].nickname,
        img_url: people[i].picture
      };

      if(lead_roles.includes(people[i].links.roles[0])) {
        person.Meta = this.leadRoleMetaInfo;
        people_new.unshift(person);
      }
      else {
        people_new.push(person);
      }
    };
    return people_new;
  }

  findLeadRoles(roles) {
    const lead_roles = [];
    for(const i in roles) {
      if(roles[i].role_type == this.leadRoleName) {
        lead_roles.push(roles[i].id);
      }
    }
    return lead_roles;
  }

}

Array.prototype.move = function (from, to) {
  this.splice(to, 0, this.splice(from, 1)[0]);
};